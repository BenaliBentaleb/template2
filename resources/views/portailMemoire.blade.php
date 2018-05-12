@extends('layouts.app') @section('content')

   <div class="col-md-9 memoire-container">

                    <div class="row pub-header" style="margin-bottom:20px;margin-right:-10px;margin-left:-10px;padding-top:7px;padding-bottom:4px;">
                        <div class="col-sm-3" style="margin-top:6px;">
                            <h4 style="display:inline-block;margin-bottom:0px;margin-top:6px;">Portail mémoires&nbsp;</h4>
                        </div>
                        <div class="col-sm-4 text-center" style="margin-top:6px;"><span style="font-size:16px;">Année :&nbsp;</span>
                            <ul class="list-inline" style="display:inline-block">
                                <li class="order-btn" data-sort="order:asc">ASC</li>
                                <li class="order-btn" data-sort="order:descending">DSC</li>
                            </ul>
                        </div>
                        <div class="col-md-5 text-center">
                            <ul class="list-inline shuffle text-center" style="margin-bottom:0;margin-top:6px;">
                                <li class="filter all mixitup-control-active selected" data-filter="all">Tous</li>
                                <li class="filter licence-title" data-filter=".licence">Licence</li>
                                <li class="filter master-title" data-filter=".master">Master</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="row memoires">


                        <div class="col-md-6 mix licence" style="padding-right:5px;padding-left:5px;" data-order="2018">
                            <div class="memoire">
                                <div class="row memoire-row" style="margin-right:0;">
                                    <div class="col-lg-6 col-md-7 col-sm-4 col-xs-12 text-center" style="padding-right:0;">
                                        <div class="memoire-thumb" style="background-image:url(&quot;{{asset('assets/img/memoire-licence.png')}}&quot;);">
                                            <div class="text-center memoire-titre">
                                                <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium<br><br></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-8 col-xs-12" style="padding-left:0;">
                                        <div class="memoire-contenu">
                                            <h3 style="margin-top:5px;">Mémoire de Licence TI 2018</h3>
                                            <h4 style="margin-top:20px;margin-bottom:0;">Réaliser par :</h4>
                                            <ul style="padding-left:16px;">
                                                <li>Lorem ipsum dolor&nbsp;<br></li>
                                                <li>Cras sed leo&nbsp;<br></li>
                                                <li>Aliquam aliquet<br></li>
                                                <li>Aliquam aliquet<br></li>
                                            </ul>
                                            <h4 style="margin-top:10px;margin-bottom:0;">Encadré par :</h4>
                                            <p>Dr. Lorem ipsum dolor<br></p><button class="btn btn-link btn-block" type="button" style="font-size:16px;"><i class="icon-arrow-down-circle" style="font-size:16px;padding-right:10px;"></i>Télécharger</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mix master" style="padding-right:5px;padding-left:5px;" data-order="2018">
                            <div class="memoire">
                                <div class="row memoire-row" style="margin-right:0;">
                                    <div class="col-lg-6 col-md-7 col-sm-4 col-xs-12 text-center" style="padding-right:0;">
                                        <div class="memoire-thumb" style="background-image:url(&quot;{{asset('assets/img/memoire-master.png')}}&quot;);">
                                            <div class="text-center memoire-titre">
                                                <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium<br><br></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-8 col-xs-12" style="padding-left:0;">
                                        <div class="memoire-contenu">
                                            <h3 style="margin-top:5px;">Mémoire de Master STIC 2018</h3>
                                            <h4 style="margin-top:20px;margin-bottom:0;">Réaliser par :</h4>
                                            <ul style="padding-left:16px;">
                                                <li>Lorem ipsum dolor&nbsp;<br></li>
                                                <li>Cras sed leo&nbsp;<br></li>
                                                <li>Aliquam aliquet<br></li>
                                                <li>Aliquam aliquet<br></li>
                                            </ul>
                                            <h4 style="margin-top:10px;margin-bottom:0;">Encadré par :</h4>
                                            <p>Dr. Lorem ipsum dolor<br></p><button class="btn btn-link btn-block" type="button" style="font-size:16px;"><i class="icon-arrow-down-circle" style="font-size:16px;padding-right:10px;"></i>Télécharger</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                      
            
                    </div>
                </div>

@endsection