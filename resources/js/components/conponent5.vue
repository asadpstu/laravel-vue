<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Facades - Service Container - Singleton</div>

                    <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                              <tbody><tr>
                                <th>Sector</th>
                                <th>Website</th>
                                <th>Performance</th>

                                

                              </tr>
                              <tr >
                                <td>{{all.Doc[0]}}</td>
                                <td>{{all.Doc[1]}}</td>
                                <td>{{all.Doc[2]}}</td>
                              </tr>
                              <tr >
                                <td>{{all.Engg[0]}}</td>
                                <td>{{all.Engg[1]}}</td>
                                <td>{{all.Engg[2]}}</td>
                              </tr>
                              <tr >
                                <td>{{all.Navy[0]}}</td>
                                <td>{{all.Navy[1]}}</td>
                                <td>{{all.Navy[2]}}</td>
                              </tr>
                              <tr >
                                <td>{{all.Pol[0]}}</td>
                                <td>{{all.Pol[1]}}</td>
                                <td>{{all.Pol[2]}}</td>
                              </tr>
                              <tr >
                                <td>{{all.Rab[0]}}</td>
                                <td>{{all.Rab[1]}}</td>
                                <td>{{all.Rab[2]}}</td>
                              </tr>
                              
                            </tbody></table>
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
              all : {}
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
          this.callFacade();
        },
        methods:{
           callFacade()
           {
           console.log("Facade Fuction Called!");
               axios.get('facade/information')
               .then((response)=>{
                this.all = response.data;
                console.log(this.all);
               })
               .catch((err)=>{
                 console.log(err)
               })
           }
        }
    }
</script>
