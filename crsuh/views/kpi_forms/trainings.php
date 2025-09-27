<div class="col-sm-12">
    <div class="mb-3">
        <label for="training_done" class="form-label fw-semibold mb-0">Was Training done?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="training_done" value="Yes" id="radioDefault1">
            <label class="form-check-label" for="radioDefault1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="training_done" value="No" id="radioDefault2" checked>
            <label class="form-check-label" for="radioDefault2">No</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="training_date" class="form-label fw-semibold mb-0">Training carried out on?</label>
        <input type="text" name="training_date" id="training_date" value="" class="form-control picker-with-time" placeholder="Click to pick date & time" required />
    </div>
    <div class="mb-3">
        <label for="training_theme" class="form-label fw-semibold mb-0">Theme for training</label>
        <textarea id="desc" class="form-control " name="training_theme" required></textarea>
    </div>
    <div class="d-flex align-items-center justify-content-end">
        <button id="continueBtn" type="button" class="btn btn-lg btn-outline-primary">Continue</button>
    </div>
</div>