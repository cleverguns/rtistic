<!-- Modal -->
<div class="modal fade" id="add-color" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">Color Name</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Color Name</label>
                    <input type="text" class="form-control" name="color_name" id="color_name" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group mt-2">
                    <label class="form-label">Color Code</label>
                    <input type="text" class="form-control" id="colorpicker-showinput-intial" value="#f46a6a">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-soft-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="save-color">Save</button>
            </div>
        </div>
    </div>
</div>
