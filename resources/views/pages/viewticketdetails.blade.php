 {{-- View Ticekt --}}
    <div class="modal fade modal-lg" id="viewticketModal" tabindex="-1" aria-labelledby="viewticket" aria-hidden="true" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="viewticketModalLabel">Ticket Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- View Ticket Body --}}
                <div class="modal-body">
                    <form id="viewticketForm" method="POST"  action="{{route('/tickets',{{$ticket->ticket_id}})}}" aria-label="Add Ticket">
                        {{csrf_field()}}
                     <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="p-2" for="urgency">Urgency</label>
                                <select name="urgency" id="urgency" class="form-select" disabled>
                                    <option value="{{$ticket->urgency_id}}" selected>{{$urgencies->urgency_lvl}}</option>
                                    
                                </select>
                                {{-- <input 
                                    type="text" 
                                    class="form-control" 
                                    name="urgency" 
                                    id="urgency" 
                                    required aria-label="Urgency"
                                    value="{{$ticket->urgency_id}}" disabled> --}}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group postion-relative">
                                <label class="p-2" for="">Account</label>
                                <input type="text" class="form-control" name="account" id="account" required aria-label="Account">
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group postion-relative">
                                <label class="p-2" for="">Complainant</label>
                                <input type="text" class="form-control" name="complainant" id="complainant" required aria-label="Complainant">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                             <div class="form-group postion-relative">
                                <label class="p-2" for="">Ticket Status</label>
                                <input type="text" class="form-control" name="ticketstatus" id="ticektstatus" required aria-label="Ticket Status">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group postion-relative">
                                <label class="p-2" for="">Assigned To</label>
                                <input type="text" class="form-control" name="assignedto" id="assignedto" required aria-label="Assigned To">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group postion-relative">
                                <label class="p-2" for="">Progress</label>
                                <input type="text" class="form-control" name="progress" id="progress" required aria-label="Progress">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                             <div class="form-group postion-relative">
                                <label class="p-2" for="">Date Created</label>
                                <input type="text" class="form-control" name="datecreated" id="datecreated" required aria-label="Date Created">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group postion-relative">
                                <label class="p-2" for="">Date Assigned</label>
                                <input type="text" class="form-control" name="dateassigned" id="dateassigned" required aria-label="Date Assigned">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group postion-relative">
                                <label class="p-2" for="">Progress Date</label>
                                <input type="text" class="form-control" name="" id="" required aria-label="Progress Date">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group postion-relative">
                                <label class="p-2" for="">Date Completed</label>
                                <input type="text" class="form-control" name="datecompleted" id="datecompleted" required aria-label="Date Completed">
                            </div>
                        </div>
                    </div>
                      <div class="form-group postion-relative">
                                <label class="p-2" for="description">Ticket Description</label>
                                <textarea 
                                    type="text" 
                                    class="form-control" 
                                    name="description" 
                                    id="ticketdescription" 
                                    required placeholder="Ticket Description"
                                    style="height: 100px;"
                                    disabled></textarea>
                      </div>
                            <button class="btn btn-success ms-1 p-1" id="opnupdareTicket">Update</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>