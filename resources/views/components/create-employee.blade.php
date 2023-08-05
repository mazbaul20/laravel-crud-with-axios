<!-- Add Employee -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Phone *</label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="createEmployee()" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function createEmployee(){
        let name=$('#name').val();
        let email=$('#email').val();
        let phone=$('#phone').val();

        if(name.length===0){
            errorToast("name is required!");
        }else if(email.length===0){
            errorToast("email is required!");
        }else if(phone.length===0){
            errorToast("phone is required!");
        }else{
            $('#modal-close').click();
            showLoader();
            let url = "{{url('/create-employee')}}";
            let res=await axios.post(url,{
                'name':name,
                'email':email,
                'phone':phone
            });
            hideLoader();

            if(res.status===200 && res.data['status']=='success'){
                successToast('Customer created successful');
                $('#save-form').trigger('reset');
                await GetList();
            }else{
                errorToast("Request fail!");
            }
        }
    }
</script>