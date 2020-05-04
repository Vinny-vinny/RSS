<template>
    <aside class="main-sidebar" id="sidebar-wrapper">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg" class="img-circle"
                         alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{username()}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"></li>
                <!-- Optionally, you can add icons to the links -->
                <li><router-link to="/job-vacancy"><i class="fa fa-cubes angle-left"></i> <span>Vacancies</span></router-link></li>
                <li><router-link to="/categories"><i class="fa fa-list angle-left"></i> <span>Categories</span></router-link></li>
                <li><router-link to="/job-types"><i class="fa fa-list angle-left"></i> <span>Job Types</span></router-link></li>
                <li><router-link to="/locations"><i class="fa fa-location-arrow angle-left"></i> <span>Locations</span></router-link></li>
                <li><router-link to="/users"><i class="fa fa-users angle-left"></i> <span>Users</span></router-link></li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
</template>
<script>
    export default {
      methods:{
          username(){
              return User.name();
          }
      }
    }
</script>

<style scoped>

</style>
