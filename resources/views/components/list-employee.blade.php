<div class="container-fluid w-75 mt-3">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Employees</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>					
                        </div>
                    </div>
                </div>
                
                <table class="table table-hover" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    GetList();
    async function GetList(){
        showLoader();
        let res= await axios.get('/list-employee');
        hideLoader();
        console.log(res)

        let tableData = $('#tableData');
        let tableList = $('#tableList');

        tableData.DataTable().destroy();
        tableList.empty();
        
        res.data.forEach(function(item,index){
            let row = (`
                <tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    <td>${item['email']}</td>
                    <td>${item['phone']}</td>
                    <td>
                        <a type="button" data-id="${item['id']}" class="edit">
                            <i class="material-icons" title="Edit">&#xE254;</i>
                        </a>
                        <a type="button" data-id="${item['id']}" class="delete">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                        
                    </td>
                </tr>
            `);
            tableList.append(row);
        });

        $('.edit').on('click', async function(){
            let id=$(this).data('id');
            await FillUpEditForm(id);
            $('#editEmployeeModal').modal('show');
        });

        $('.delete').on('click', function(){
            let id=$(this).data('id');
            $('#deleteID').val(id);
            $('#deleteEmployeeModal').modal('show');
        });

        tableData.DataTable({
            order:[[0,'asc']],
            lengthMenu:[5,10,15,20]
        });
    }
</script>