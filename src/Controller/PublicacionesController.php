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

        $this->loadModel('Users');
        $users = $this->Users->find('all')->contain(['UsersPerfiles'])->where(['UsersPerfiles.user_id' => $this->Auth->user('id')])
        ->hydrate(false)
        ->toArray();

        $this->set(compact('users'));
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

        $this->loadModel('Users');
        $user = $this->Users->find('all')->contain(['UsersPerfiles'])->where(['UsersPerfiles.user_id' => $this->Auth->user('id')])
        ->hydrate(false)
        ->toArray();
        //$total_public = $this->Publicaciones->find('all')->where(['Publicaciones.id' => $id)]);//->count();
        //$id_menor = $this->Publicaciones->find('first')->where(['Publicaciones.id' < $id)]);
        $id_menor = $this->Publicaciones->find('all', ['limit' => 1,'order' => 'Publicaciones.id DESC'])
        ->where(['Publicaciones.id <' => $id])->limit(1)
        ->hydrate(false)
        ->toArray();

        $id_mayor = $this->Publicaciones->find('all', ['limit' => 1,'order' => 'Publicaciones.id ASC'])
        ->where(['Publicaciones.id >' => $id])->limit(1)
        ->hydrate(false)
        ->toArray();

        $total_public = $this->Publicaciones->find('all')->count();

        $this->set('publ_actual', $id);
        $this->set('tot_publ', $total_public);
        $this->set('user', $user[0]);
        $this->set('id_menor', isset($id_menor[0]['id'])?$id_menor[0]['id']:null);
        $this->set('id_mayor', isset($id_mayor[0]['id'])?$id_mayor[0]['id']:null);
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
                $this->Flash->success(__('Publicacion Editada con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La publicacion no pudo ser guardada'));
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
            $this->Flash->success(__('La Publicacion fue eliminada con exito.'));
        } else {
            $this->Flash->error(__('La aplicacion no se puedo eliminar'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
