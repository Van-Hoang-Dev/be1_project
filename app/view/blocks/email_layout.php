<div class="formbold-form-wrapper mt-5" style="margin-bottom: 30px;
    border-radius: 10px;
    box-shadow: 1px 1px 17px 3px #ccc;">
    <form action="send.php" method="post" enctype="multipart/form-data">
        <div class="formbold-form-title">
            <h2 class="">Send email </h2>
        </div>
        <div class="formbold-mb-3">
            <label for="email" class="formbold-form-label">
               Email
            </label>
            <input type="eamil" name="email" id="email" class="formbold-form-input" value="" />
        </div>
        <div class="formbold-mb-3">
            <label for="subject" class="formbold-form-label">
               Subject
            </label>
            <input type="text" name="subject" id="subject" class="formbold-form-input" value="" />
        </div>
        <div class="formbold-mb-3">
            <label for="message" class="formbold-form-label">
               Message
            </label>
            <textarea id="editor" type="text" name="message" id="message" class="formbold-form-input"></textarea>
        </div>
        <button type="submit" name="send" class="formbold-btn">Send</button>
    </form>
</div>