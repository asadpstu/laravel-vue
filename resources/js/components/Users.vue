<template>
    <div class="container">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>

                <div class="card-tools">

                <!--<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add New <i class="fas fa-user-plus"></i></button>-->
                <button class="btn btn-success" @click="openform">Add New <i class="fas fa-user-plus"></i></button>
                
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th align='center'>Photo</th>
                    <th>Registered Date</th>
                    <th>Action</th>

                  </tr>
                  <tr v-for="singleuser in userlist.data">
                    <td>{{singleuser.id}}</td>
                    <td>{{singleuser.name | capitalize}}</td>
                    <td>{{singleuser.email}}</td>
                    <td>{{singleuser.type  | capitalize}}</td>
                    <td><img v-bind:src="'/images/' + singleuser.photo" style="height:50px"/></td>
                    <td>{{singleuser.created_at | datefilter}}</td>
                    <td>
                        <a href="#" @click="editform(singleuser)">
                        <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" @click="deleteUser(singleuser.id)">
                        <i class="fa fa-trash" style="color:red"></i>
                        </a>
                    </td>
                  </tr>
                  
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <pagination :data="userlist" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>  


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-show="editmode">Update User Data</h5>
                    <h5 class="modal-title" id="exampleModalLabel" v-show="!editmode">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <form @submit.prevent="editmode ? updateuser() : registeruser()" >

                    <div class="modal-body">

                      <div class="form-group">
                        <input v-model="form.name" type="text" name="name" placeholder="User Name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                      </div>

                      <div class="form-group">
                        <input v-model="form.email" type="text" name="email" placeholder="User email"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                      </div>

                      <div class="form-group">
                        <input v-model="form.password" type="text" name="password" placeholder="User password"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                      </div>

                      <div class="form-group">
                        <select v-model="form.type" type="text" name="type" placeholder="User type"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                          <option value="">Please select User Type</option>
                          <option value="admin">Admin</option>
                          <option value="user">Normal User</option>
                          <option value="author">Author</option>
                          </select>
                        <has-error :form="form" field="type"></has-error>
                      </div>

                      <div class="form-group">
                        <textarea v-model="form.biodata" type="text" name="biodata" placeholder="User biodata"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('biodata') }"></textarea>
                        <has-error :form="form" field="biodata"></has-error>
                      </div>
                    </div>

                    <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button v-show="editmode" type="submit" class="btn btn-warning">Edit & Save</button>
                          <button v-show="!editmode" type="submit" class="btn btn-primary">Save New Record</button>
                    </div>
                  </form>

                </div>

              </div> 
            </div>      
    </div>
</template>

<script>
    export default {
          data () {
            return {
              editmode : false,
              userlist  : {},
              returnmessage  : {},
              // Create a new form instance
              form: new Form({
                id: '',
                name: '',
                email: '',
                password: '',
                type: '',                
                biodata: '',
                photo:''              
              })
            }
          },

        methods:{
            openform(){
             this.editmode = false;
             this.form.reset();
             $('#myModal').modal('show');
            },

            editform(singleuser){
             this.editmode = true;
             this.form.clear();
             $('#myModal').modal('show');
             this.form.fill(singleuser);
            },
            updateuser(){
               this.$Progress.start()
               this.form.put('api/user/'+this.form.id)
               .then(()=>{
                    toast({
                    type: 'success',
                    title: 'Sweet-Alert : Success!'
                  });
               this.getuser();  
               this.$Progress.finish()
               $('#myModal').modal('hide');
               })
               .catch(()=>{
                    toast({
                    type: 'error',
                    title: 'Sweet-Alert : Error!'
                  });
                this.$Progress.fail()                 
               })
            },

            deleteUser(id){


                const swalWithBootstrapButtons = swal.mixin({
                  confirmButtonClass: 'btn btn-success',
                  cancelButtonClass: 'btn btn-danger',
                  buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Proceed',
                  cancelButtonText: 'Cancel',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    console.log('delete');
                    this.form.delete('api/user/'+id)
                    .then(()=>{
                          swalWithBootstrapButtons(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                          );
                          this.getuser();
                    })
                    .catch(()=>{
                    swalWithBootstrapButtons(
                      'Error',
                      'Not Deleted',
                      'error'
                    )                    
                    })

                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons(
                      'Cancelled',
                      'Deletion Cancelled',
                      'error'
                    )
                  }
                })
                

            },
            
            getuser(){
              this.$Progress.start()
              axios.get('api/user').then(({data})=>(this.userlist = data));
              this.$Progress.finish()
            },
            getResults(page = 1) {
                  axios.get('api/user?page=' + page)
                    .then(response => {
                      this.userlist = response.data;
                    });
            },
            
            registeruser()
            {
              
              this.$Progress.start()
              this.form.post('api/user').then(function (response) 
              {
                  console.log(response);                  
                  toast({
                    type: 'success',
                    title: 'Sweet-Alert : Success!'
                  });
                  $('#myModal').modal('hide');
                 
              })
              .catch(function (error) {
                  console.log(error);
                  toast({
                    type: 'error',
                    title: 'Sweet-Alert : Error!'
                  });
              });
              
              this.$Progress.finish()
              this.getuser();
              
              
            }

        },          
        created() {
            this.$Progress.start()
            this.getuser();
            this.$Progress.finish()
            //setInterval(()=>this.getuser(), 60000);

            Fire.$on('searching',()=>{
                 let search = this.$parent.search;
                 
                 {
                   axios.get('api/search-user?q='+search)
                   .then((data)=>{
                        this.userlist = data.data;
                   })
                   .catch(()=>{
                        console.log("Error");
                   })
                 }
                 if(search == '')
                 {
                  toast({
                    type: 'warning',
                    title: 'Warning : Please Write Something On The Search Bar'
                  });
                 }

            })
        }
    }
</script>
