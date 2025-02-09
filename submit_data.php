<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // 🔹 لا تخزن كلمة المرور كنص عادي، استخدم التشفير دائمًا
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // 🔹 حفظ البيانات في ملف نصي (غير آمن - يفضل قاعدة بيانات)
    file_put_contents("logins.txt", "User: $username | Password: $hashed_password\n", FILE_APPEND);

    // 🔹 إعادة توجيه المستخدم إلى صفحة نجاح بعد التسجيل
    header("Location: http://www.example.com/thank-you");
    exit();
}
?>
