
                <!-- Modal 1-->
                <div class="modal fade " class="modal-dialog modal-dialog-centered" id="edit{{ $data->id }}"
                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paidloanLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paidloanLabel">Products Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!--Modal form-->

                            <form action="{{ Route('pages.editproduct', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                @method('put')

                                <div class="modal-body">

                                    <div class="card-body">

                                        <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name" value={{ $data->name }}>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="description" class="form-control"
                                                        placeholder="Description" value={{ $data->description }}>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="price" class="form-control"
                                                        placeholder="Price" value={{ $data->price }}>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <img src="{{ asset('images/'.$data->image) }}" width= '80' height='80'/>
                                                    <input type="file" id="image" name="image" class="form-control"
                                                        placeholder="Image" value={{ $data->image }}>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

