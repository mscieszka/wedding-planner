<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Booking;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users', 'Offers', 'Payments'],
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $booking = $this->Bookings->get($id, [
            'contain' => ['Users', 'Offers', 'Payments', 'SavedUserBookings'],
        ]);

        $this->set(compact('booking'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booking = $this->Bookings->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            /* date availability */
            $check = $this->Bookings->find()->where([
                'offer_id' => $booking->offer_id,
                'booking_date' => $booking->booking_date
            ])->count();
            if ($check > 0) {
                $this->Flash->error(__('Date is already taken'));
                return $this->redirect($this->referer());
            }
            $booking->user_id = $this->request->getAttribute('identity')->getIdentifier();
            /*payment*/
            $offer = $this->Bookings->Offers->get($booking->offer_id);
            $payment = $this->Bookings->Payments->newEmptyEntity();
            $payment->is_paid = false;
            $payment->price = $offer->advance_payment;
            $this->Bookings->Payments->save($payment);
            $booking->payment_id = $payment->id;

            //            debug($booking); exit;
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('Pomyślnie dodano ofertę do zarezerwowanych'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', ['limit' => 200])->all();
        $offers = $this->Bookings->Offers->find('list', ['limit' => 200])->all();
        $payments = $this->Bookings->Payments->find('list', ['limit' => 200])->all();
        $this->set(compact('booking', 'users', 'offers', 'payments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $booking = $this->Bookings->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($booking);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('Pomyślnie dodano ofertę do zarezerwowanych'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', ['limit' => 200])->all();
        $offers = $this->Bookings->Offers->find('list', ['limit' => 200])->all();
        $payments = $this->Bookings->Payments->find('list', ['limit' => 200])->all();
        $this->set(compact('booking', 'users', 'offers', 'payments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        $this->Authorization->authorize($booking);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('Pomyślnie anulowano rezerwację'));
        } else {
            $this->Flash->error(__('Anulowanie rezerwacji zakończone niepowodzeniem. Spróbuj ponownie'));
        }

        return $this->redirect($this->referer());
    }

    // additional functions

    protected function cancelBooking(Booking $booking)
    {
        $booking->is_canceled = true;
    }

    protected function releaseBooking(Booking $booking)
    {
        $booking->is_released = true;
    }

    protected function createMultipleBookings()
    {
        //TODO

    }
}
