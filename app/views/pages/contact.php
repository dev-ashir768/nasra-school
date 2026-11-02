<section class="container py-16">
    <h1 class="section-title">Contact Us</h1>

    <form id="contact-form" action="<?= base_url('contact') ?>" method="post" class="mt-8 max-w-xl space-y-4">
        <?= csrf_field() ?>
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-input" required>
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-input" required>
        </div>
        <div>
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" rows="5" class="form-input" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
        <p id="form-status" class="hidden text-sm"></p>
    </form>
</section>
