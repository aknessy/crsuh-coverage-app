<div class="col-sm-12">
    <div class="mb-3">
        <label class="form-label fw-semibold mb-0">Sector</label>
        <select id="sector" class="form-select" name="sector" required>
            <option value="">Select Sector</option>
            <option value="Formal">Formal Sector</option>
            <option value="Informal">Informal Sector</option>
            <option value="Vulnerable">Vulnerable</option>
        </select>
    </div>
    <div id="hideAll" class="row">
        <div class="col-sm-12">
            <div id="Formal" class="mb-3">
                <label class="form-label fw-semibold mb-0">Sub-sector</label>
                <select class="form-select" name="sub_sector">
                    <option value="">Select Sub-sector</option>
                    <option value="Civil Servant" data-employer-level="#employerLevel">State Civil Service</option>
                    <option value="Government Worker">Federal Civil Service</option>
                </select>
            </div>
            <div id="Informal" class="mb-3 d-none">
                <label class="form-label fw-semibold mb-0">Sub-sector</label>
                <select class="form-select" name="sub_sector">
                    <otion value="">Select Sub-sector</option>
                    <option value="Organized Private Sector">Organize Private Sector</option>
                    <option value="Adoption (GIFSHIP)">Adoption (GIFSHIP)</option>
                    <option value="Tertiary Institution (TSHIP)">Tertiary Institution (TSHIP)</option>
                </select>
            </div>
            <div id="Vulnerable" class="mb-3 d-none">
                <label class="form-label fw-semibold mb-0">Sub-sector</label>
                <select class="form-select" name="sub_sector">
                    <otion value="">Select Sub-sector</option>
                    <option value="BHCPF">BHCPF</option>
                    <option value="State Government Equity">State Government Equity</option>                                    
                </select>
            </div>
        </div>
    </div>
    <div id="employerLevel" class="row mb-3 d-none">
        <div class="col-sm-12">
            <label for="level" class="form-label fw-semibold mb-0">Employer Level</label>
            <select id="level" name="employer_level" class="form-select">
                <option value="">Select Option</option>
                <option value="State Government">State Government</option>
                <option value="Local Government">Local Government</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 d-flex align-items-center justify-content-end">
            <button id="continueBtn" type="button" class="btn btn-lg btn-outline-primary">Continue</button>
        </div>
    </div>
</div>

<script>
    $(function(){
        const sector = $('#sector');

        $(sector).change(function(){
            $('#hideAll').addClass('d-none');
            $('#employerLevel').addClass('d-none');
            
            let selectedSector = $(this).val();

            if(selectedSector !== ''){
                $('#hideAll').removeClass('d-none');

                $('#'+selectedSector).siblings().addClass('d-none')
                $('#'+selectedSector).removeClass('d-none')
            }
        });

        $('#Formal').on('change', function(){
            var selectedFormalSector = $(this).find(':selected');
            var employerLevel = selectedFormalSector.data('employer-level');
            
            if(employerLevel !== undefined){
                $(employerLevel).removeClass('d-none');
                
            }else{
                $('#employerLevel').addClass('d-none')
                
            }
        });

    });
</script>