<div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/images/pms-bg2.jpg">
      <div class="logo"><a href="#" class="simple-text logo-normal">
         <img src='../assets/images/pms-logo.png' style="height: 36px;width: 40px;"> PMS
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?=($access=='dashboard')?"active":"";?>">
            <a class="nav-link" href="index.php?access=dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?=($access=='projects')?"active":"";?>">
            <a class="nav-link" href="index.php?access=projects">
              <i class="material-icons">rule</i>
              <p>Projects</p>
            </a>
          </li>
          <li class="nav-item <?=($access=='calendar')?"active":"";?>">
            <a class="nav-link" href="index.php?access=calendar">
              <i class="material-icons">calendar_today</i>
              <p>Calendar</p>
            </a>
          </li>
          <li class="nav-item <?=($access=='messages')?"active":"";?>">
            <a class="nav-link" href="index.php?access=messages">
              <i class="material-icons">chat_bubble_outline</i>
              <p>Messages</p>
            </a>
          </li>
          <hr>
          <li class="nav-item <?=($access=='profile')?"active":"";?>"  style="display: inline-flex;margin: 0px 0px 0px 37px;">
            <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="User Profile" href="#" style="height: 54px;width: 58px;background: #4fbcd4;">
              <i class="material-icons" style="color: white;">manage_accounts</i>
            </a>
            <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Logout" href="#" onclick='logout()' style="height: 54px;width: 58px;background: #4fbcd4;">
              <i class="material-icons" style="color: white;">logout</i>
            </a>
          </li>
        </ul>
      </div>
    </div>