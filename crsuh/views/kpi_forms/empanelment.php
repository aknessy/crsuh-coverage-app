<div class="col-sm-12">
    <div class="mb-3">
        <label class="form-label fw-semibold mb-0">Sector</label>
        <select id="sector" class="form-select" name="sector">
            <option value="">Select Sector</option>
            <option value="Formal">Formal Sector</option>
            <option value="Informal">Informal Sector</option>
            <option value="Vulnerable">Vulnerable</option>
        </select>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <label class="form-label fw-semibold mb-0">Sub-sector</label>
                <select id="subSector" class="form-select" name="sub_sector">
                    <option value="">Select Sub-sector</option>
                    <option value="Civil Servants">State Civil Service</option>
                    <option value="Government Worker">Federal Civil Service</option>
                </select>
            </div>
        </div>
    </div>
    <div id="employerLevel" class="row mb-3 d-none">
        <div class="col-sm-12">
            <label class="form-label fw-semibold mb-0">Employer Level</label>
            <select name="employer_level" class="form-select">
                <option value="State Government">State Government</option>
                <option value="Local Government">Local Government</option>
            </select>
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
        $('#sector').on('change', function(){
            $('#employerLevel').addClass('d-none');
        });

        $('#subSector').on('change', function(){
            $('#employerLevel').addClass('d-none');

            var selectedSubSector = $(this).val();
            
            if(selectedSubSector !== '' && selectedSubSector === 'Civil Servants'){
                $('#employerLevel').removeClass('d-none')
            }else{
                $('#employerLevel').addClass('d-none')
            }
        });

        $('#Informal').on('change', function(){
            var selectedInformalSector = $(this).val();

            if(selectedInformalSector !== ''){
                $('#continueBtn').attr('disabled', false)
            }else{
                $('#continueBtn').attr('disabled', true)
            }
        });

        $('#Vulnerable').on('change', function(){
            var selectedVulnerableSector = $(this).val()

            if(selectedVulnerableSector !== ''){
                $('#continueBtn').attr('disabled', false);
            }else{
                $('#continueBtn').attr('disabled', true);
            }
        })
    });
</script>