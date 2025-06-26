<div class="container">
    {{-- Add Ticket --}}
    <div class="modal fade modal-lg" id="addticketModal" tabindex="-1" aria-labelledby="addticket" aria-hidden="true" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="addticketModalLabel">New Ticket</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Add Ticket Body --}}
                <div class="modal-body">
                    <form id="addticketForm" method="POST"  action="{{url('/tickets')}}" aria-label="Add Ticket">
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label class="required-field p-2 fw-semibold" for="complainant">Complainant</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="complainant" 
                                            id="complainant" 
                                            required 
                                            aria-label="Complainant Name"
                                            placeholder="Complainant Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                        <div class="form-group position-relative">
                                            <label  class="required-field p-2 fw-semibold" for="accounts">Accounts</label>
                                            <select name="accounts" id="accounts" class="form-select">
                                                <option selected>--SELECT ACCOUNT--</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{$account->account_id}}"> {{$account->account_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group position-relative">
                                    <label  class="required-field p-2 fw-semibold" for="urgency">Urgency</label>
                                    {{-- <input type="text" class="form-control" name="urgency" id="urgency" required aria-label="Urgency"> --}}
                                    <select name="urgency" id="urgency" class="form-select">
                                        <option selected>--SELECT URGENCY--</option>
                                    @foreach ($urgency as $urgencies)
                                        <option  value="{{$urgencies->urgency_id}}" >{{$urgencies->urgency_lvl}}</option>
                                        @endforeach
                                    </select>
                            </div>
                                </div>
                                <div class="col-6">
                                     <div class="form-group position-relative">
                                    <label class="p-2 fw-semibold" for="programmer">Assigned to</label>
                                    <select name="programmer" id="programmer" class="form-select">
                                        <option selected>--SELECT PROGRAMMER--</option>
                                        @foreach ($programmers as $prog)
                                            <option value="{{$prog->user_id}}">{{$prog->user_fname}} {{$prog->user_mname}} {{$prog->user_lname}}</option>
                                        @endforeach
                                    </select>
                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group position-relative">
                                    <label class="required-field p-2 fw-semibold" for="ticketdescription">Ticket Description</label>
                                    <textarea 
                                        type="text" 
                                        class="form-control" 
                                        name="ticketdescription" 
                                        id="ticketdescription" 
                                        required aria-label="Ticket Description"
                                        style="height: 150px;"
                                        placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" class=" btn btn-mute" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- View Ticekt --}}
    <div class="modal fade" id="viewticket" tabindex="-1" aria-labelledby="viewticket" aria-hidden="true" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="viewticketModalLabel">Ticket Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- View Ticket Body --}}
                <div class="modal-body">
                    <form id="viewticketForm" method="POST"  action="{{url('/tickets')}}" aria-label="Add Ticket">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="urgency">Urgency</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="urgency" 
                                    id="urgency" 
                                    required aria-label="Urgency"
                                    placeholder="Urgency">
                            </div>
                            <div class="form-group postion-relative">
                                <label for="description">Ticket Description</label>
                                <input type="text" class="form-control" name="description" id="ticketdescription" required placeholder="Ticket Description">
                            </div>
                            <div class="form-group postion-relative">
                                <label for=""></label>
                                <input type="text" class="form-control" name="" id="" required aria-label="">
                            </div>
                            <div class="form-group postion-relative">
                                <label for=""></label>
                                <input type="text" class="form-control" name="" id="" required aria-label="">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
            // Open Modal 1
            document.getElementById('openaddTicket').addEventListener('click', function() {
                var addticket = new bootstrap.Modal(document.getElementById('addticketModal'));
                addticket.show();
            });
    });
</script>
<style>
.required-field::after {
    content: " *";
    color: #e74c3c;
}

</style>