@if (count($bookings) > 0)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $booking->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('prescription') }}" method="post">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="app">

                        <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
                        <input type="hidden" name="doctor_id" value="{{ $booking->doctor_id }}">
                        <input type="hidden" name="date" value="{{ $booking->date }}">

                        <div class="form-group">
                            <label>Disease</label>
                            <input type="text" name="name_of_disease" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Symptoms</label>

                            <textarea name="symptoms" class="form-control" placeholder="" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Medicine</label>
                            <textarea name="medicine" class="form-control" placeholder="" required></textarea>

                        </div>
                        <div class="form-group">
                            <label>Usage Instruction</label>
                            <textarea name="usage_instruction" class="form-control" placeholder="" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea name="feedback" class="form-control" placeholder="" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" name="signature" class="form-control" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
