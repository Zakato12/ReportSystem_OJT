<div class="container">
    {{-- Add Ticket --}}
    <div class="modal fade" id="addticketModal" tabindex="-1" aria-labelledby="addticket" aria-hidden="true" aria-modal="true">
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
                            <div class="form-group">
                                <label for="complainant">Complainant</label>
                                <input type="text" class="form-control" name="complainant" id="complainant" required aria-label="Complainant">
                            </div>
                            <div class="form-group position-relative">
                                <label for="ticketdescription">Ticket Description</label>
                                <input type="text" class="form-control" name="ticketdescription" id="ticketdescription" required aria-label="Ticket Description">
                            </div>
                            <div class="form-group position-relative">
                                <label for="urgency">Urgency</label>
                                {{-- <input type="text" class="form-control" name="urgency" id="urgency" required aria-label="Urgency"> --}}
                                <select name="urgency" id="urgency" class="form-select">
                                    @foreach ($urgency as $urgencies)
                                        <option  value="{{$urgencies->urgency_id}}" {{old('urgency') == $urgencies->urgency_id ? 'selected' : ''}}>{{$urgencies->urgency_status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group position-relative">
                                <label for="school">School</label>
                                <select name="school" id="school" class="form-select">
                                    @foreach ($schools as $school)
                                        <option value="{{$school->school_id}}" {{old('schools') == $school->school_id ? 'selected' : ''}}> {{$school->school_name}}></option>
                                    @endforeach
                                </select>
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
