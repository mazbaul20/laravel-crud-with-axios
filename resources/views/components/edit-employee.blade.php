<!-- Edit Modal HTML -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Name *</label>
                                <input type="text" class="form-control" id="EmployeeName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Email *</label>
                                <input type="text" class="form-control" id="EmployeeEmail">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Phone *</label>
                                <input type="text" class="form-control" id="EmployeePhone">
                            </div>
                            <input type="text" hidden id="EditId">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="close-btn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="Update()" type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpEditForm(id){
        $('#EditId').val(id);
        showLoader();
        let res=await axios.post('/employee-by-id',{id:id});
        hideLoader();
        $('#EmployeeName').val(res.data['name']);
        $('#EmployeeEmail').val(res.data['email']);
        $('#EmployeePhone').val(res.data['phone']);
    }

    async function Update(){
        let id      = $('#EditId').val();
        let name    = $('#EmployeeName').val();
        let email   = $('#EmployeeEmail').val();
        let phone   = $('#EmployeePhone').val();

        if(name.length===0){
            errorToast('Name is required!');
        }else if(email.length===0){
            errorToast('Email is required!');
        }else if(phone.length===0){
            errorToast('Phone is required!');
        }else{
            showLoader();
            let res = await axios.put('/update-employee',{
                id:id,
                name:name,
                email:email,
                phone,phone
            });
            hideLoader();
            if(res.status===200 && res.data['status']=='success'){
                $('#close-btn').click();
                successToast('Employee updated successful');
                await GetList();
            }else{
                errorToast('Requiest fail!');
            }
        }
    }
</script>