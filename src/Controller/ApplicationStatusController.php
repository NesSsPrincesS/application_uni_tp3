<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicationStatus Controller
 *
 * @property \App\Model\Table\ApplicationStatusTable $ApplicationStatus
 *
 * @method \App\Model\Entity\ApplicationStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationStatusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $applicationStatus = $this->paginate($this->ApplicationStatus);

        $this->set(compact('applicationStatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Application Status id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationStatus = $this->ApplicationStatus->get($id, [
            'contain' => ['ProgramApplications']
        ]);

        $this->set('applicationStatus', $applicationStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationStatus = $this->ApplicationStatus->newEntity();
        if ($this->request->is('post')) {
            $applicationStatus = $this->ApplicationStatus->patchEntity($applicationStatus, $this->request->getData());
            if ($this->ApplicationStatus->save($applicationStatus)) {
                $this->Flash->success(__('The application status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application status could not be saved. Please, try again.'));
        }
        $this->set(compact('applicationStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationStatus = $this->ApplicationStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicationStatus = $this->ApplicationStatus->patchEntity($applicationStatus, $this->request->getData());
            if ($this->ApplicationStatus->save($applicationStatus)) {
                $this->Flash->success(__('The application status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application status could not be saved. Please, try again.'));
        }
        $this->set(compact('applicationStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Application Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationStatus = $this->ApplicationStatus->get($id);
        if ($this->ApplicationStatus->delete($applicationStatus)) {
            $this->Flash->success(__('The application status has been deleted.'));
        } else {
            $this->Flash->error(__('The application status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
