<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Complex Api for MongoDB & Node.js </div>

                    <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                              <tbody>
                              <tr>
                                <th>SL</th>
                                <th>Type</th>
                                <th>Api(Product)</th>
                                <th>Instruction</th>
                              </tr>
                              <tr >
                                <td>1</td>
                                <td>GET</td>
                                <td>http://127.0.0.1:3000/product</td>
                                <td>No Instruction</td>
                              </tr>
                              <tr >
                                <td>2</td>
                                <td>POST</td>
                                <td>http://127.0.0.1:3000/product</td>
                                <td>
                                Data Format for client  request method body<hr>
                                {
                                    "song": "Amar Sombol",
                                    "singer_id": 17,
                                    "song_type": "Folk Song",
                                    "song_duration": 5.9
                                }
                                </td>
                              </tr>
                              <tr >
                                <td>3</td>
                                <td>GET</td>
                                <td>http://127.0.0.1:3000/product/{id}</td>
                                <td>
                                Pass the product id in the parameter section
                                </td>
                              </tr>
                              <tr >
                                <td>4</td>
                                <td>PATCH</td>
                                <td>http://127.0.0.1:3000/product/{id}</td>
                                <td>
                                Data Format for client  request method body<hr>
                                {
                                "song": "Amar Sombol",
                                "singer_id": 17,
                                "song_type": "Folk Song",
                                "song_duration": 5.9
                                }
                                </td>
                              </tr>
                              <tr >
                                <td>5</td>
                                <td>DELETE</td>
                                <td>http://127.0.0.1:3000/product/{id}</td>
                                <td>
                                Pass the product id in the parameter section to delete
                                </td>
                              </tr>

                              <tr>
                                <th>SL</th>
                                <th>Type</th>
                                <th>Api(Order)</th>
                                <th>Instruction</th>
                              </tr>
                             <tr >
                                <td>1</td>
                                <td>GET</td>
                                <td>http://127.0.0.1:3000/order</td>
                                <td>No Instruction</td>
                              </tr>
                              <tr >
                                <td>2</td>
                                <td>POST</td>
                                <td>http://127.0.0.1:3000/order</td>
                                <td>
                                Data Format for client  request method body<hr>
                                {
                                    "song_id": ,
                                    "Quantity": 2,
                                    "Country": "Bangladesh",
                                    "Ordername": "Order from Bangladesh",
                                    "Datetime": "2018-11-20 23:59:59"
                                }
                                </td>
                              </tr>
                              <tr >
                                <td>1</td>
                                <td>GET</td>
                                <td>http://127.0.0.1:3000/order/{id}</td>
                                <td>
                                Pass the order id in the parameter section
                                </td>
                              </tr>
                              <tr >
                                <td>1</td>
                                <td>PATCH</td>
                                <td>http://127.0.0.1:3000/order/{id}</td>
                                <td>
                                Data Format for client  request method body<hr>
                                {
                                    "song_id": ,
                                    "Quantity": 2,
                                    "Country": "Bangladesh",
                                    "Ordername": "Order from Bangladesh",
                                    "Datetime": "2018-11-20 23:59:59"
                                }
                                </td>
                              </tr>
                              <tr >
                                <td>1</td>
                                <td>DELETE</td>
                                <td>http://127.0.0.1:3000/order/{id}</td>
                                <td>
                                Pass the order id in the parameter section to delete
                                </td>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
