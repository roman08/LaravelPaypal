
<div style="background: #005000;" class="text-center">
    <h3  class="center-block" style=" color: #ffffff;  position :relative !important; ">TUS PROMOCIONES</h3>
</div>

<div  class="text-center">
    <h4>Describe como quieres motivar a tus clientes!!!</h4>
</div>

<div  class="text-center">
    <h5>En caso que lo desee podrá agregar 5 promociones!!!</h5>
</div>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="thumbnail producto">
                @php($img = "/img/default.png" )
                @if(isset($pro1))
                    @php($img =$pro1->url )
                @endif
                 <img src="{{$img}}" id="vprincipal" style="height: 310px; width: 680px;">

            </div>
        </div>
    </div>




    <div class="row center-block" style="width: 95%;">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    Promociones</h2>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-promociones"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-promociones"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-promociones" class="carousel slide hidden-xs" data-ride="carousel" id="divPromociones">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-3">
                            @if(!isset($pro1))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class="btn-imagen-promocion-1 promocion" data-numero="1" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar una promoción</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($pro1))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$pro1->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                   <strong>Vigencia</strong> </h5>
                                                <h5 ><spam >{{$pro1->vig_inicio}} -  {{$pro1->vig_fin}}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Subcategoría</strong> 
                                                </h5><spam >{{ $pro1->subcategoria  }}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Nombre de la Promoción</strong> 
                                                </h5><spam >{{ $pro1->descripcion  }}</spam>
                                            </div>

                                           
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editPromocion" href="{{$pro1->idpromocion}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <a href="{{ route('promocion.delete',['id' => $pro1->idpromocion]) }}"  class="hidden-sm deletePro">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($pro2))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-promocion-2 promocion" data-numero="2" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar una promoción</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($pro2))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$pro2->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                   <strong>Vigencia</strong> </h5>
                                                <spam >{{$pro2->vig_inicio}} -  {{$pro2->vig_fin}}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Subcategoría</strong> 
                                                </h5><spam >{{ $pro2->subcategoria  }}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Nombre de la Promoción</strong> 
                                                </h5><spam >{{ $pro2->descripcion  }}</spam>
                                            </div>

                                           
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editPromocion" href="{{$pro2->idpromocion}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <a href="{{ route('promocion.delete',['id' => $pro2->idpromocion]) }}"  class="hidden-sm deletePro">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($pro3))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class="btn-imagen-promocion-3 promocion" data-numero="3" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar una promoción</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($pro3))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$pro3->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                   <strong>Vigencia</strong> </h5>
                                                <spam >{{$pro3->vig_inicio}} -  {{$pro3->vig_fin}}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Subcategoría</strong> 
                                                </h5><spam >{{ $pro3->subcategoria  }}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Nombre de la Promoción</strong> 
                                                </h5><spam >{{ $pro3->descripcion  }}</spam>
                                            </div>

                                           
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editPromocion" href="{{$pro3->idpromocion}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <a href="{{ route('promocion.delete',['id' => $pro3->idpromocion]) }}"  class="hidden-sm deletePro">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($pro4))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class="btn-imagen-promocion-4 promocion" data-numero="4" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar una promoción</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($pro4))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$pro4->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                   <strong>Vigencia</strong> </h5>
                                                <spam >{{$pro4->vig_inicio}} -  {{$pro4->vig_fin}}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Subcategoría</strong> 
                                                </h5><spam >{{ $pro4->subcategoria  }}</spam>
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                    <strong>Nombre de la Promoción</strong> 
                                                </h5><spam >{{ $pro4->descripcion  }}</spam>
                                            </div>

                                           
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editPromocion" href="{{$pro4->idpromocion}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <a href="{{ route('promocion.delete',['id' => $pro4->idpromocion]) }}"  class="hidden-sm deletePro">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                 <div class="item">
                    <div class="row">
                        <div class="col-sm-3">
                            @if(!isset($pro5))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class="btn-imagen-promocion-5 promocion" data-numero="5" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar una promoción</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($pro5))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$pro5->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                    
                                                   <strong>Vigencia</strong> 
                                               </h5>
                                                   <spam >{{$pro5->vig_inicio}} -  {{$pro5->vig_fin}}</spam>
                                                
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    <strong>Subcategoría</strong>
                                                </h5>
                                                    <spam >{{ $pro5->subcategoria  }}</spam>
                                                     
                                              
                                            </div>
                                            <div class="price col-md-12">
                                                <h5>
                                                    <strong>Nombre de la Promoción</strong> 
                                                </h5>
                                                    <spam >{{ $pro5->descripcion  }}</spam>
                                                    
                                                
                                            </div>

                                           
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editPromocion" href="{{$pro5->idpromocion}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <a href="{{ route('promocion.delete',['id' => $pro5->idpromocion]) }}"  class="hidden-sm deletePro">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>