<div class="col-sm-12">
    <div class="mb-3">
        <label class="form-label fw-semibold mb-0">Providers</label>
        <select id="sector" class="form-select" name="sector">
            <option value="">Select Provider</option>
            <option value="Primary" data-provider="#primary">Primary Providers</option>
            <option value="Secondary">Secondary Providers</option>
            <option value="Tertiary">Tertiary Providers</option>
        </select>
    </div>
    <div id="primary" class="mb-4 d-none">
        <label for="lgas" class="form-label fw-semibold mb-0">LGA</label>
        <select id="lga" class="form-select" name="qual_ash_lga" required>
            <option value="">Select LGA</option>
            <?php
                if($lgas){
                    foreach($lgas as $obj){
                        echo '<option value="' . $obj->id . '">' . strtoupper($obj->name) . "</option>";
                    }
                }
            ?>
        </select>
    </div>
    <div class="d-flex align-items-center justify-content-end">
        <button id="continueBtn" type="button" class="btn btn-lg btn-outline-primary">Continue</button>
    </div>
</div>

<script>
    $(function(){
        $('#sector').on('change', function(){
            var selectedProvider = $(this).val();

            if(selectedProvider === 'Primary'){
                $('#primary').removeClass('d-none')
            }else{
                $('#primary').addClass('d-none')
            }
        })
    })
</script>