<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Universities Controller
 *
 * @property \App\Model\Table\UniversitiesTable $Universities
 *
 * @method \App\Model\Entity\University[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UniversitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $universities = $this->paginate($this->Universities);

        $this->set(compact('universities'));
    }

    /**
     * View method
     *
     * @param string|null $id University id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $university = $this->Universities->get($id, [
            'contain' => ['ProgramApplications' => ['ApplicationOutcomes', 'ApplicationStatus', 'Programs', 'Users']]
        ]);


        $this->set('university', $university);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $university = $this->Universities->newEntity();
        if ($this->request->is('post')) {
            $university = $this->Universities->patchEntity($university, $this->request->getData());
            if ($this->Universities->save($university)) {
                $this->Flash->success(__('The university has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The university could not be saved. Please, try again.'));
        }
        $this->set(compact('university'));
    }

    /**
     * Edit method
     *
     * @param string|null $id University id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $university = $this->Universities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $university = $this->Universities->patchEntity($university, $this->request->getData());
            if ($this->Universities->save($university)) {
                $this->Flash->success(__('The university has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The university could not be saved. Please, try again.'));
        }
        $this->set(compact('university'));
    }

    /**
     * Delete method
     *
     * @param string|null $id University id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $university = $this->Universities->get($id);
        if ($this->Universities->delete($university)) {
            $this->Flash->success(__('The university has been deleted.'));
        } else {
            $this->Flash->error(__('The university could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
