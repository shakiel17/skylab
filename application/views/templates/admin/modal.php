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
                <a href="<?=base_url();?>admin_logout" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageRider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <?=form_open(base_url()."save_rider");?>
            <input type="hidden" name="id" id="rider_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Manage Rider</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="rider_fullname" placeholder="First Middle Last Name" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" id="rider_address" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Contact No.</label>
                    <input type="text" class="form-control" name="contactno" id="rider_contactno" placeholder="09XXXXXXXXX" required>
                </div>
                <div class="form-group">
                    <label>Plate No.</label>
                    <input type="text" class="form-control" name="plateno" id="rider_plateno" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="rider_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
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

<div class="modal fade" id="manageLicense" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <?=form_open_multipart(base_url()."save_license");?>
            <input type="hidden" name="id" id="license_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Manage License Upload</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>License Image</label>
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