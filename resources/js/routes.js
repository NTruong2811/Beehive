import layout from "./view/layout/layout";
// main
import Newfeeds from "./view/pages/Newfeeds";
// watch
import Watch from "./view/pages/Watch";
import Watchs from "./view/Tabs/WatchTab/Watchs";
import Musics from "./view/Tabs/WatchTab/Musics";
import Videos from "./view/Tabs/WatchTab/Videos";
import Detail from "./view/pages/Detail";
// auth
import Login from "./view/pages/Login";
import Register from "./view/pages/Register";
import Profile from "./view/pages/Profile";
// friends
import FriendShip from "./view/pages/FriendsShip";
import FriendList from "./view/Tabs/FriendTab/FriendList";
import NewFriend from "./view/Tabs/FriendTab/NewFriend";
// profile
import Call from "./view/pages/Call";
import profile from "./view/components/ProfileComponent/profile";
import watchs from "./view/components/ProfileComponent/watchs";
// detail
import VideoDetail from "./view/components/PostComponent/VideoDetailComponent";
import MusicDetail from "./view/components/PostComponent/MusicDetailComponent";
// beechat
import Beechat from "./view/pages/Beechat"
// shop
import Shop from "./view/pages/Shop"
const routes = [
    {
        path: "/",
        component: layout,
        children: [
            {
                path: "/",
                component: Newfeeds,
            },
            {
                path: "/watch",
                component: Watch,
                children: [
                    {
                        path: "",
                        component: Watchs,
                    },
                    {
                        path: "musics",
                        component: Musics,
                    },
                    {
                        path: "videos",
                        component: Videos,
                    },
                ],
            },
            {
                path: "/friendships",
                component: FriendShip,
                redirect: "/friendships/friend_list",
                children: [
                    {
                        path: "friend_list",
                        component: FriendList,
                    },
                    {
                        path: "new_friend",
                        component: NewFriend,
                    },
                ],
            },
            {
                path: "/shop",
                component: Shop,
            },
        ],
        meta: { AppProduct: true },
    },
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: { Auth: true },
    },
    {
        path: "/register",
        component: Register,
        meta: { Auth: true },
    },
    {
        path: "/call",
        component: Call,
        meta: { AppProduct: true },
    },
    {
        path: "/profile",
        component: Profile,
        // redirect: "/activity",
        children: [
            {
                path: "",
                component: profile,
            },
            {
                path: "friendships",
                component: FriendShip,
                redirect: "/profile/friendships/friend_list",
                children: [
                    {
                        path: "friend_list",
                        component: FriendList,
                    },
                    {
                        path: "new_friend",
                        component: NewFriend,
                    },
                ],
            },
            {
                path:'watchs',
                component:watchs
            }
        ],
        meta: { AppProduct: true },
    },
    {
        path: "/detail",
        component: Detail,
        children: [
            {
                path: "video",
                component: VideoDetail,
            },
            {
                path: "music",
                component: MusicDetail,
            },
        ],
        meta: { AppProduct: true,back:true },
    },
    {
        path: "/beechat",
        component: Beechat,
        meta: { AppProduct: true },
    },
];

export default routes;
