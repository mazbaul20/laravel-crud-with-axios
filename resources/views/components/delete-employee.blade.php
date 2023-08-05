<!-- Delete Modal HTML -->
<div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteID"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function itemDelete(){
        let id = $('#deleteID').val();
        $('#delete-modal-close').click();
        showLoader();
        let res = await axios.post('{{ url("/delete-employee") }}',{id:id});
        hideLoader();
        if(res.data===1){
            successToast('Employee Deleted successful');
            await GetList();
        }else{
            errorToast('Requiest fail!');
        }
    }
</script>