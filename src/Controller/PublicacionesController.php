<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Publicaciones Controller
 *
 * @property \App\Model\Table\PublicacionesTable $Publicaciones
 *
 * @method \App\Model\Entity\Publicacione[] paginate($object = null, array $settings = [])
 */
class PublicacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $publicaciones = $this->paginate($this->Publicaciones);

        $this->set(compact('publicaciones'));
        $this->set('_serialize', ['publicaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Publicacione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publicacione = $this->Publicaciones->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('publicacione', $publicacione);
        $this->set('_serialize', ['publicacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publicacione = $this->Publicaciones->newEntity();
        if ($this->request->is('post')) {
            $publicacione = $this->Publicaciones->patchEntity($publicacione, $this->request->getData());
            if ($this->Publicaciones->save($publicacione)) {
                $this->Flash->success(__('The publicacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publicacione could not be saved. Please, try again.'));
        }
        $users = $this->Publicaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('publicacione', 'users'));
        $this->set('_serialize', ['publicacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Publicacione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publicacione = $this->Publicaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publicacione = $this->Publicaciones->patchEntity($publicacione, $this->request->getData());
            if ($this->Publicaciones->save($publicacione)) {
                $this->Flash->success(__('The publicacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publicacione could not be saved. Please, try again.'));
        }
        $users = $this->Publicaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('publicacione', 'users'));
        $this->set('_serialize', ['publicacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Publicacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publicacione = $this->Publicaciones->get($id);
        if ($this->Publicaciones->delete($publicacione)) {
            $this->Flash->success(__('The publicacione has been deleted.'));
        } else {
            $this->Flash->error(__('The publicacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
