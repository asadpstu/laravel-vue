<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Complex Query 2 # Mongo DB Operation</div>

                          <div class="card-body table-responsive p-0" >
                            <table class="table table-hover">
                              <tbody id="div_tbl">
                              
                              
                              </tbody>
                            </table>
                          </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default 
    {   
        data(){
            return{
              record  : {},
              all : {}
            }
        },
        mounted()
        {
            console.log('Component mounted.');
        },
        created()
        {
          console.log('Loaded Creat ..');
          this.load();
        },
        methods:
        {
          load()
          {
              /*axios.get('http://localhost:3000/product/',{ headers: { 'crossDomain': true, 'Content-Type': 'application/json'}})
              .then((data)=>{
                this.record = data.data;
              })
              .catch(()=>{
              console.log("Error");
              })*/
              

              $.getJSON('http://localhost:3000/product/', function(data) 
              {
              this.record = data;
              this.all = this.record.response.data;
              console.log(this.all);
              console.log(this.all.length);
              var tableData = '<tr><th>Name</th><th>Song Type</th><th>Duration</th><th>Type</th><th>Details</th></tr>';

                $.each(this.all, function(index, data) {
                 tableData += '<tr><td>'+data.name+'</td><td>'+data.type+'</td><td>'+data.duration+'</td><td><a href="'+data.other.url+'" >Detail</a></td><td>'+data.other.type+'</td></tr>';
                });
                $('#div_tbl').html(tableData);



              });
          }

        }
    }
</script>
