
<main role="main">
    <section>
        <div id="proceso">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" id="venta-tickets-tab" href="#venta-tickets" tabindex="-1">Venta de tickets</a></li>
                            <li><a data-toggle="tab" id="pago-ganadores-tab" href="#pago-ganadores" tabindex="-1">Pago a ganadores</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="venta-tickets" class="tab-pane fade in active">
                                <?php $this->load->view('/principal/venta-tickets');?>                                
                            </div>
                            <div id="pago-ganadores" class="tab-pane fade">
                                <?php $this->load->view('/principal/pago-ganadores');?>                                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="detalles">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php $this->load->view('/principal/detalles-ticket');?>                                                                
                        
                    </div>
                    <div class="col-md-4">
                        <?php $this->load->view('/principal/detalles-cajero');?>                                                                
                        
                    </div>
                    <div class="col-md-4">
                        <?php $this->load->view('/principal/numpad');?>                                                                
                        
                    </div>
                </div>
            </div>
        </div>
        <div id="inputs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php $this->load->view('/principal/botones-finales');?>                                                                
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
