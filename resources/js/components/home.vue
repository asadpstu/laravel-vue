<style>
.file-upload-form, .image-preview {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    padding: 20px;
}
img.preview {
    width: 200px;
    background-color: white;
    border: 1px solid #DDD;
    padding: 5px;
}

</style>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body box-profile">
                <div class="text-center" v-if="form">
                  <img class="profile-user-img img-fluid img-circle" :src="'images/'+form.photo" alt="User profile picture" >
  
                </div>

                <h3 class="profile-username text-center" v-if="form">{{ form.name }}</h3>
                <p class="text-muted text-center" v-if="form"><i class="fas fa-hiking"></i><small style="margin-left:10px;">{{form.created_at | datefilter}}</small></p>
                <p class="text-muted text-center" v-if="form">{{form.profession}}</p>


                <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> Education</strong>

                <p class="text-muted" v-if="form">
                 <small> {{form.education}} </small> 
                </p>

                <hr>

                <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                <p class="text-muted" v-if="form"> <small> {{form.location}} </small></p>

                <hr>

                <strong><i class="fas fa-graduation-cap"></i> Skills</strong>

                <p class="text-muted" v-if="form" >
                 <small> {{form.skills}} </small> 
                </p>

                <hr>

                <strong><i class="fas fa-book-open"></i> Notes</strong>

                <p class="text-muted" v-if="form"><small>{{form.notes}} </small> </p>
              </div>
              <!-- /.card-body -->

                

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active show" href="#activity" data-toggle="tab">Change Profile </a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Information</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active show" id="activity">
                  
                  <div class="form-group">
                    
                        <label for="inputExperience" class="col-sm-6 control-label">Update old profile photo</label>

                        <div class="col-sm-10">
                        <input @change="onImageChange" type="file" name="file"  accept=".png, .jpg, .jpeg" />
                        
                        </div>
                        <!--<div class="image-preview" v-if="imageData.length > 0">
			                       <img class="preview" :src="imageData">
			                      </div>-->
                           <div  class="image-preview" v-if="image">
                              <img :src="image" class="preview" >
                           </div>    
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                          <button class="btn btn-success btn-block" @click="uploadImage">Upload Image</button>
                        </div>
                      </div>
                     
                  </div>
                  
                 
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                  Second Tab
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" @submit.prevent="updatauthuser">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="hidden" v-model="form.id" class="form-control" id="id" placeholder="id">
                          <input v-model="form.name" type="text" name="name" placeholder="name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                        <input v-model="form.email" type="text" name="email" placeholder="Email"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputName2" class="col-sm-6 control-label">Education <small>Please provide the recent one</small></label>
                        <div class="col-sm-10">
                        <input v-model="form.education" type="text" name="education" placeholder="education"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('education') }">
                        <has-error :form="form" field="education"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Location</label>
                        <div class="col-sm-10">
                        <input v-model="form.location" type="text" name="location" placeholder="location"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                        <has-error :form="form" field="location"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Profession</label>
                        <div class="col-sm-10">
                        <input v-model="form.profession" type="text" name="profession" placeholder="profession"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('profession') }">
                        <has-error :form="form" field="profession"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-6 control-label">Skills</label>
                        <div class="col-sm-10">
                        <input v-model="form.skills" type="text" name="skills" placeholder="skills"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('skills') }">
                        <has-error :form="form" field="skills"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-6 control-label">Important Notes <small>Let us know about you</small></label>
                        <div class="col-sm-10">
                        <textarea v-model="form.notes" type="text" name="notes" placeholder="notes"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('notes') }"></textarea>
                        <has-error :form="form" field="notes"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

</section>











            </div>
        </div>
    </div>
</template>

<script>
    export default 
    {

		data: function() {
		    return {
		      userdata: [],
          image: '',
		      imageData: "",  // we will store base64 format of image in this string
		      // Create a new form instance
              form: new Form({
                id: '',
                name: '',
                email: '',             
                photo: '',
                education:'',
                location:'',
                skills:'',
                notes:'',
                profession:''

              }),
              form2: new Form({
                id: '',
                photo:''

              })
		    }
		},

        mounted() 
        {
            console.log('Component mounted.')
        },
        
        methods:
        {
           getuserinfo()
           {
           axios.get('api/authuser').then(({data})=>(this.form.fill(data)));
           },
           updatauthuser()
           {
           this.$Progress.start()
           this.form.put('api/AuthUserUpdate/'+this.form.id)
           .then(()=>{

                  toast({
                    type: 'success',
                    title: 'Sweet-Alert : Success!'
                  });
            this.$Progress.finish()
           })
           .catch(()=>{
           
                  toast({
                    type: 'error',
                    title: 'Sweet-Alert : Error!'
                  });

            this.$Progress.fail()
           })
           },
           upload(event)
           {
                
	            var input = event.target;
	            var input2 = event.target.files[0];
	            console.log(input2);
	            // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imageData = e.target.result;
                    console.log(this.imageData);
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);

            }
                
           },
           updatepropic()
           {
             axios.put('api/picupdate')
             .then(()=>{

                  toast({
                    type: 'success',
                    title: 'Sweet-Alert : Success!'
                  });

             })
             .catch(()=>{

                  toast({
                    type: 'error',
                    title: 'Sweet-Alert : Error!'
                  });

             })
           },
           onImageChange(e) {
                this.$Progress.start();
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            uploadImage(){
                this.$Progress.start();
                axios.post('/image/store',{image: this.image})
                .then(()=>{
                  
                  toast({
                    type: 'success',
                    title: 'Sweet-Alert : Success! Please Refresh the Page.'
                  });
                  this.$Progress.finish();
                
                })
                .catch(()=>{

                  toast({
                    type: 'error',
                    title: 'Sweet-Alert : Error!'
                  });
                  this.$Progress.fail();
                })
            }
        },
        created()
        {
           this.getuserinfo()
           
        },
    }
</script>
