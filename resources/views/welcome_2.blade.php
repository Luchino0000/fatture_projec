<x-layout>
      
    <x-navbar/>
    
   
        <div class="container-fluid welcome-container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <!-- Benvenuto -->
                    <div class="welcome-header">
                        <h1 class="text-center">Benvenuto nel Gestionale di Fatture</h1>
                        <p class="text-center">Gestisci facilmente le tue fatture e tieni traccia delle tue operazioni finanziarie.</p>
                    </div>
    
                    <!-- Statistiche / Info -->
                    <div class="row dashboard-cards">
                        <div class="col-md-4 col-sm-12">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h5 class="card-title">Totale Fatture</h5>
                                    <p class="card-text">120</p> <!-- Modifica dinamicamente -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h5 class="card-title">Fatture Pendenti</h5>
                                    <p class="card-text">5</p> <!-- Modifica dinamicamente -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h5 class="card-title">Totale Importo</h5>
                                    <p class="card-text">€10.500,00</p> <!-- Modifica dinamicamente -->
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Azioni veloci -->
                    <div class="row mt-5">
                        <div class="col-6">
                            <a href="">
                                <button class="btn btn-lg btn-primary w-100 custom-btn">Aggiungi Fattura</button>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="">
                                <button class="btn btn-lg btn-secondary w-100 custom-btn">Visualizza Fatture</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    
    









</x-layout>