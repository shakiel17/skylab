<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Leaving so soon?</h4>
            </div>
            <div class="modal-body">
                <h2>Do you wish to logout?</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <a href="<?=base_url();?>rider_logout" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ConfirmBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Booking</h4>
            </div>
            <div class="modal-body">
                <h2>Do you wish to confirm this booking?</h2>
            </div>
            <div class="modal-footer">
                <?=form_open(base_url()."confirm_rider_booking");?>
                <input type="hidden" name="id" id="confirm_id">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</a>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="CancelBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Booking</h4>
            </div>
            <div class="modal-body">
                <h2>Do you wish to cancel this booking?</h2>
            </div>
            <div class="modal-footer">
                <?=form_open(base_url()."cancel_rider_booking");?>
                <input type="hidden" name="id" id="cancel_id">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</a>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="CompleteBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Booking</h4>
            </div>
            <div class="modal-body">
                <h2>Do you wish to complete this booking?</h2>
            </div>
            <div class="modal-footer">
                <?=form_open(base_url()."complete_booking");?>
                <input type="hidden" name="id" id="complete_id">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</a>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>