<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicationOutcomes Controller
 *
 * @property \App\Model\Table\ApplicationOutcomesTable $ApplicationOutcomes
 *
 * @method \App\Model\Entity\ApplicationOutcome[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationOutcomesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $applicationOutcomes = $this->paginate($this->ApplicationOutcomes);

        $this->set(compact('applicationOutcomes'));
    }

    /**
     * View method
     *
     * @param string|null $id Application Outcome id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationOutcome = $this->ApplicationOutcomes->get($id, [
            'contain' => ['ProgramApplications']
        ]);

        $this->set('applicationOutcome', $applicationOutcome);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationOutcome = $this->ApplicationOutcomes->newEntity();
        if ($this->request->is('post')) {
            $applicationOutcome = $this->ApplicationOutcomes->patchEntity($applicationOutcome, $this->request->getData());
            if ($this->ApplicationOutcomes->save($applicationOutcome)) {
                $this->Flash->success(__('The application outcome has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application outcome could not be saved. Please, try again.'));
        }
        $this->set(compact('applicationOutcome'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application Outcome id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationOutcome = $this->ApplicationOutcomes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicationOutcome = $this->ApplicationOutcomes->patchEntity($applicationOutcome, $this->request->getData());
            if ($this->ApplicationOutcomes->save($applicationOutcome)) {
                $this->Flash->success(__('The application outcome has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application outcome could not be saved. Please, try again.'));
        }
        $this->set(compact('applicationOutcome'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Application Outcome id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationOutcome = $this->ApplicationOutcomes->get($id);
        if ($this->ApplicationOutcomes->delete($applicationOutcome)) {
            $this->Flash->success(__('The application outcome has been deleted.'));
        } else {
            $this->Flash->error(__('The application outcome could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
