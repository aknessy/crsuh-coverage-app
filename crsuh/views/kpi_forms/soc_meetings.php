<div class="col-sm-12">
    <div class="mb-3">
        <label for="soc_meeting_held" class="form-label fw-semibold mb-0">Was SOC Meeting confirmed?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="soc_meeting_held" value="Yes" id="radioDefault1">
            <label class="form-check-label" for="radioDefault1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="soc_meeting_held" value="No" id="radioDefault2" checked>
            <label class="form-check-label" for="radioDefault2">No</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="meeting_date" class="form-label fw-semibold mb-0">Date & Time Meeting was Held</label>
        <input type="text" name="meeting_date" id="meeting_date" value="" class="form-control picker-with-time" placeholder="Click to pick date" required />
    </div>
    <div class="mb-3">
        <label for="key_notes" class="form-label fw-semibold mb-0">Keynotes</label>
        <textarea id="desc" class="form-control" name="key_notes" rows="4" required></textarea>
    </div>
    <div class="d-flex align-items-center justify-content-end">
        <button id="continueBtn" type="button" class="btn btn-lg btn-outline-primary">Continue</button>
    </div>
</div>