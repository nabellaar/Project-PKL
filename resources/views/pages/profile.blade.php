<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>My Profile</title>
</head>
<style>
  body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

.profile {
  max-width: 400px;
  margin: 150px auto;
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.profile-picture {
  width: 200px;
  height: 180px;
  border-radius: 50%;
  margin: 0 auto 10px;
  display: block;
}

.username {
  margin: 5px 0;
  color: #333;
}

.bio {
  margin: 10px 0;
  color: #666;
}

.count {
  font-weight: bold;
}

.follow-info {
  display: flex;
  justify-content: space-around;
  margin-top: 20px;
  color: #888;
}
</style>
<body>
  <div class="profile">
    <img src="img/profilepic.jpg" alt="" class="profile-picture">
    <h1 class="username">@bell</h1>
    <div class="bio">
      <p>🌱 Exploring Life's Realities 🌱</p>
      <p>📸 Capturing Moments with Truth 📸</p>
      <p>🌍 Wanderer of Authentic Experiences 🌍</p>
    </div>
    <div class="follow-info">
      <p><span class="count">10.5K</span> Followers</p>
      <p><span class="count">150</span> Following</p>
    </div>
  </div>
</body>
</html>
