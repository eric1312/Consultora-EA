<section id="contacto" class="container section">
    <div class="contact-card">
        <div>
            <h2>Contáctanos</h2>
            <p>Si buscas una consultora de software que te ayude a construir una web profesional para tu tienda o empresa, estamos listos para acompañarte.</p>
            <div class="contact-item">
                <strong>Correo:</strong><br>
                eaconsultoradigital@gmail.com
            </div>
            <div class="contact-item">
                <strong>Teléfono:</strong><br>
                +54 2345413571
            </div>
            <div class="contact-item">
                <strong>Ubicación:</strong><br>
                Saladillo, Provincia De Buenos Aires · Soluciones digitales a distancia y presenciales
            </div>
        </div>
        <form action="{{ route('contact.store') }}" method="post">
            @csrf
            @if (session('success'))
                <div style="margin-bottom: 12px; padding: 10px 12px; border-radius: 10px; background: #e8f8ee; color: #166534; font-weight: 600;">
                    {{ session('success') }}
                </div>
            @endif

            <label for="name">Nombre</label>
            <input id="name" name="name" type="text" placeholder="Tu nombre" required>

            <label for="email">Correo</label>
            <input id="email" name="email" type="email" placeholder="tu@email.com" required>

            <label for="message">Mensaje</label>
            <textarea id="message" name="message" placeholder="Cuéntanos sobre tu proyecto" required></textarea>

            <button type="submit" class="btn btn-primary">Enviar mensaje</button>
        </form>
    </div>
</section>
