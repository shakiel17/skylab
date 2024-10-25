<style>
    .google-map {
     padding-bottom: 50%;
     position: relative;
}

.google-map iframe {
     height: 100%;
     width: 100%;
     left: 0;
     top: 0;
     position: absolute;
}
    </style>

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
                <a href="<?=base_url();?>user_logout" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AddVID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <?=form_open_multipart(base_url()."save_valid_id");?>
            <input type="hidden" name="id" id="valid_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Valid ID Upload</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Valid ID</label>
                    <input type="file" name="file" class="form-control" required>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade" id="updateUserAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <?=form_open(base_url()."save_user_account");?>
            <input type="hidden" name="id" id="user_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update User Account</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" id="user_username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="user_password" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade" id="EditUserProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <?=form_open(base_url()."save_user_profile");?>
            <input type="hidden" name="id" id="prof_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update User Profile</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" id="prof_name" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" id="prof_address" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Contact No.</label>
                    <input type="text" name="contactno" class="form-control" id="prof_contactno" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" id="prof_email" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade" id="addBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <?=form_open(base_url()."save_booking");?>
            <input type="hidden" name="commuter_id" id="book_commuter_id">
            <input type="hidden" name="rider_id" id="book_rider_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Booking</h4>
            </div>
            <div class="modal-body">                
                <div class="form-group">
                    <label>Origin</label>
                    <textarea name="origin" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Destination</label>
                    <textarea name="destination" class="form-control" rows="3"></textarea>
                </div>                    
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="book_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" name="book_time" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
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
                <?=form_open(base_url()."cancel_user_booking");?>
                <input type="hidden" name="id" id="cancel_id">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</a>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>