<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Gerenciamento de Pedidos</title>
    <link rel="stylesheet" href="/System-gest/assets/css/_theme.css">
</head>
<body>
    <header class="header">
        <div class="logo">Sistema de Gestão de Serviços</div>
        <div class="user-info"></div>
    </header>

    <main class="main-content">

        <!-- Estatísticas -->
        <div class="stats">

            <!-- CARD REMOVIDO (comentado corretamente) -->
            <!--
            <div class="stat-card">
                <div class="stat-number"></div>
                <div class="stat-label">Serviços Realizados</div>
            </div>
            -->

            <div class="stat-card">
                <div class="stat-fat">0</div>
                <div class="stat-label">Faturamento</div>
            </div>

            <div class="stat-card">
                <div class="stat-clients">0</div>
                <div class="stat-label">Clientes Ativos</div>
            </div>

            <div class="stat-card">
                <div class="stat-agends">0</div>
                <div class="stat-label">Serviços Agendados</div>
            </div>

        </div>

        <br>
        <hr>
        <br><br><br>

        <!-- Tabela de Serviços -->
        <div class="section">
            <div class="section-header">Serviços</div>
            <div class="section-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Status</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="serviceTableBody"></tbody>
                </table>
            </div>
        </div>

        <!-- Ações Rápidas -->
        <div class="section">
            <div class="section-header">Ações Rápidas</div>
            <div class="section-content">
                <div class="actions">
                    <a href="app.php" class="action-btn">Agendar Serviço</a>
                    <button class="action-btn" id="logout-btn">Logout</button>
                </div>
            </div>
        </div>

    </main>

    <script src="/System-gest/assets/js/Dashboard.js"></script>
    <script src="/System-gest/assets/js/Logout.js"></script>
</body>
</html>
