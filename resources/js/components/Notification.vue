<template>
    <li class="dropdown" id="markasread">
        <div style=" padding: 16px">
            <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" aria-expanded="true">
                <i class="far fa-bell" style="font-size: 20px; color: black">
                </i>
            <span class="badge badge-danger">{{ unreads.length() }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation">
                    <a class="dropdown-menu-header text-center">Notifications</a>
                </li>
                <ul style="margin:10px;width:300px; padding-left: 0px">
                    <notification-item v-for="unread in unread"></notification-item>
                    <div>
                        <p>
                            Your “Volume Trendline” PDF is ready <a href="">here</a>
                            <i class="timeline-date">Dec 10, 22:00</i>
                        </p>
                    </div>
                    <div>
                        <p>
                            Your “Marketplace Report” PDF is ready <a href="">here</a>
                            <i class="timeline-date">Dec 6, 10:17</i>
                        </p>
                    </div>
                    <div>
                        <p>
                            Your “Top Words” spreadsheet is ready <a href="">here</a>
                            <i class="timeline-date">Dec 5, 04:36</i>
                        </p>
                    </div>
                </ul>
                <li role="presentation">
                    <a href="#" class="dropdown-menu-header text-center">View all</a>
                </li>
            </ul>
        </div>
    </li>
</template>

<script>
    export default {
        prop:['unreads', 'userId'],
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.Models.User.' + this.userId)
                .notification((notification) => {
                    console.log(notification);
                });
        }
    }
</script>
