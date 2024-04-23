<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Commentphotos Controller
 *
 * @property \App\Model\Table\CommentphotosTable $Commentphotos
 */
class CommentphotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Commentphotos->find()
            ->contain(['Photos', 'Users']);
        $commentphotos = $this->paginate($query);

        $this->set(compact('commentphotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Commentphoto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commentphoto = $this->Commentphotos->get($id, contain: ['Photos', 'Users']);
        $this->set(compact('commentphoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commentphoto = $this->Commentphotos->newEmptyEntity();
        if ($this->request->is('post')) {
            $commentphoto = $this->Commentphotos->patchEntity($commentphoto, $this->request->getData());
            if ($this->Commentphotos->save($commentphoto)) {
                $this->Flash->success(__('The commentphoto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commentphoto could not be saved. Please, try again.'));
        }
        $photos = $this->Commentphotos->Photos->find('list', limit: 200)->all();
        $users = $this->Commentphotos->Users->find('list', limit: 200)->all();
        $this->set(compact('commentphoto', 'photos', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Commentphoto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commentphoto = $this->Commentphotos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commentphoto = $this->Commentphotos->patchEntity($commentphoto, $this->request->getData());
            if ($this->Commentphotos->save($commentphoto)) {
                $this->Flash->success(__('The commentphoto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commentphoto could not be saved. Please, try again.'));
        }
        $photos = $this->Commentphotos->Photos->find('list', limit: 200)->all();
        $users = $this->Commentphotos->Users->find('list', limit: 200)->all();
        $this->set(compact('commentphoto', 'photos', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Commentphoto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commentphoto = $this->Commentphotos->get($id);
        if ($this->Commentphotos->delete($commentphoto)) {
            $this->Flash->success(__('The commentphoto has been deleted.'));
        } else {
            $this->Flash->error(__('The commentphoto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
