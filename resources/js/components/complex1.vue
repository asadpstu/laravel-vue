<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Complex Query 1 #1 (Join Three Tables Song,Singer,album)</div>

                    

                          <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                              <tbody><tr>
                                <th>Singer</th>
                                <th>Country</th>
                                <th>Song</th>
                                <th>Duration</th>
                                <th>Release Year</th>
                                
                                <th>Album Details</th>
                                

                              </tr>
                              <tr v-for="singleuser in songlist.data">
                                <td>{{singleuser.singer_name}}</td>
                                <td>{{singleuser.country | capitalize}}</td>
                                <td>{{singleuser.song_name}}</td>
                                <td>{{singleuser.duration  | capitalize}}</td>
                                <td>{{ singleuser.release_year }}</td>
                                <td>[id : {{singleuser.album_id }} ] -> {{singleuser.album_name }}</td>
                                
                              </tr>
                              
                            </tbody></table>
                          </div>
                          <div class="card-footer">
                          <pagination :data="songlist" @pagination-change-page="getResults"></pagination>
                          </div>


                    
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
              songlist  : {}
            }
        },
        mounted() 
        {
            console.log('Component mounted.')
        },
        created()
        {
           console.log('Component created.')
           this.getsong()
           
            Fire.$on('searching',()=>{
                 let search = this.$parent.search;
                 
                 {
                   axios.get('api/songlist?q='+search)
                   .then((data)=>{
                        this.songlist = data.data;
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
           
        },
        methods:{

           getsong(){
                axios.get('api/songlist')
                   .then((data)=>{
                        this.songlist = data.data;
                   })
                   .catch(()=>{
                        console.log("Error");
                })
           },
           getResults(page = 1) {
                  axios.get('api/songlist?page=' + page)
                    .then(response => {
                      this.songlist = response.data;
                    });
            },

        }
    }
</script>
