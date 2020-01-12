<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ProgramApplications Controller
 *
 * @property \App\Model\Table\ProgramApplicationsTable $ProgramApplications
 *
 * @method \App\Model\Entity\ProgramApplication[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgramApplicationsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'ApplicationOutcomes', 'ApplicationStatus', 'Programs', 'Universities']
        ];
        $programApplications = $this->paginate($this->ProgramApplications);

        $this->set(compact('programApplications'));
    }

    /**
     * View method
     *
     * @param string|null $id Program Application id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $programApplication = $this->ProgramApplications->get($id, [
            'contain' => ['Users', 'ApplicationOutcomes', 'ApplicationStatus', 'Programs', 'Universities']
        ]);

        $this->set('programApplication', $programApplication);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $programApplication = $this->ProgramApplications->newEntity();
        if ($this->request->is('post')) {
            $programApplication->user_id = $this->Auth->user('id');
            $programApplication = $this->ProgramApplications->patchEntity($programApplication, $this->request->getData());

            if ($this->ProgramApplications->save($programApplication)) {
                $this->Flash->success(__('The program application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The program application could not be saved. Please, try again.'));
        }
        //$users = $this->ProgramApplications->Users->find('list', ['limit' => 200]);
        $applicationOutcomes = $this->ProgramApplications->ApplicationOutcomes->find('list', ['limit' => 200]);
        $applicationStatus = $this->ProgramApplications->ApplicationStatus->find('list', ['limit' => 200]);
        $universities = $this->ProgramApplications->Universities->find('list', ['limit' => 200]);
        $faculties = $this->ProgramApplications->Programs->Faculties->find('list', ['limit' => 200]);

        // Bâtir la liste des catégories
        $this->loadModel('Faculties');
        // Extraire le id de la première catégorie
        $faculties = $faculties->toArray();
        reset($faculties);
        $faculty_id = key($faculties);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $programs = $this->ProgramApplications->Programs->find('list', [
            'conditions' => ['Programs.faculty_id' => $faculty_id],
        ]);

        $this->set(compact('programApplication', 'users', 'applicationOutcomes', 'applicationStatus', 'programs', 'universities', 'faculties'));
        $this->set('_serialize', ['programApplication', 'programs', 'faculties']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Program Application id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $programApplication = $this->ProgramApplications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $programApplication = $this->ProgramApplications->patchEntity($programApplication, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->ProgramApplications->save($programApplication)) {
                $this->Flash->success(__('The program application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The program application could not be saved. Please, try again.'));
        }

        // Bâtir la liste des catégories
        $this->loadModel('Faculties');
        $faculties = $this->Faculties->find('list', ['limit' => 200]);

        $faculties = $faculties->toArray();
        reset($faculties);
        $faculty_id = key($faculties);

        $programs = $this->ProgramApplications->Programs->find('list', [
            'conditions' => ['Programs.$faculty_id' => $faculty_id],
        ]);

        $users = $this->ProgramApplications->Users->find('list', ['limit' => 200]);
        $applicationOutcomes = $this->ProgramApplications->ApplicationOutcomes->find('list', ['limit' => 200]);
        $applicationStatus = $this->ProgramApplications->ApplicationStatus->find('list', ['limit' => 200]);
        $universities = $this->ProgramApplications->Universities->find('list', ['limit' => 200]);
        $this->set(compact('programApplication', 'users', 'applicationOutcomes', 'applicationStatus', 'programs', 'universities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Program Application id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $programApplication = $this->ProgramApplications->get($id);
        if ($this->ProgramApplications->delete($programApplication)) {
            $this->Flash->success(__('The program application has been deleted.'));
        } else {
            $this->Flash->error(__('The program application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // Les actions 'add' et 'tags' sont toujours autorisés pour les utilisateur
        // authentifiés sur l'application
        if (in_array($action, ['add', 'aPropos'])) {
            return true;
        }

        // Toutes les autres actions nécessitent un slug
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // On vérifie que l'article appartient à l'utilisateur connecté
        $programApplication = $this->ProgramApplications->findBySlug($slug)->first();

        return $programApplication->user_id === $user['id'];
    }

}
