<div class="col-sm-12">
    <div class="mb-3">
        <label class="form-label fw-semibold mb-0">Accreditation Type</label>
        <select id="accreditationType" class="form-select" name="accreditation_type">
            <option value="">Select Type</option>
            <option value="New">Newly Accredited</option>
            <option value="Disaccredited">Newly Disaccredited</option>
        </select>
    </div>
    <div>
        <div id="New" class="row d-none">
            <div class="col-sm-12 mb-3">
                <label class="form-label fw-semibold mb-0">Sector</label>
                <select id="sector" class="form-select" name="sector">
                    <option value="">Select Sector</option>
                    <option value="Private">Private</option>
                    <option value="Public">Public</option>
                    <option value="Joint">Joint</option>
                </select>
            </div>
            <div class="col-sm-12 mb-3">
                <div id="Private" class="d-none">
                    <label for="primary" class="form-label fw-semibold mb-0">Accreditation Level</label>
                    <select id="primary" class="form-select" required name="accrediation_level">
                        <option value="">Select Level</option>
                        <option value="Primary">Primary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="Tertiary">Tertiary</option>
                    </select>
                </div>
                <div id="Public" class="d-none">
                    <label for="public" class="form-label fw-semibold mb-0">Accreditation Level</label>
                    <select id="public" class="form-select" required name="accrediation_level">
                        <option value="">Select Level</option>
                        <option value="Primary">Primary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="Tertiary">Tertiary</option>
                    </select>
                </div>
                <div id="Joint" class="d-none">
                    <label for="jointly" class="form-label fw-semibold mb-0">Accreditation Level</label>
                    <select id="jointly" class="form-select" required name="accrediation_level">
                        <option value="">Select Level</option>
                        <option value="Primary">Primary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="Tertiary">Tertiary</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="Disaccredited" class="row d-none">
            <div class="col-sm-12">
                <label for="jointly" class="form-label fw-semibold mb-0">Accreditation Level</label>
                <select id="jointly" class="form-select" name="accrediation_level" required>
                    <option value="">Select Level</option>
                    <option value="Primary">Primary</option>
                    <option value="Secondary">Secondary</option>
                    <option value="Tertiary">Tertiary</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 d-flex align-items-center justify-content-end">
            <button id="continueBtn" type="button" class="btn btn-lg btn-outline-primary" disabled>Continue</button>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#accreditationType').on('change', function(){
            var selectedType = $(this).val();

            if(selectedType !== ''){
                $('#' + selectedType).siblings().addClass('d-none');
                $('#' + selectedType).removeClass('d-none')
            }
        });

        $('#sector').on('change', function(){
            var selectedSector = $(this).val()

            if(selectedSector !== ''){
                $('#' + selectedSector).siblings().addClass('d-none');
                $('#' + selectedSector).removeClass('d-none');
            }
        })
    })
</script>