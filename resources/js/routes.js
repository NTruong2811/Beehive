import layout from "./view/layout/layout";
import Newfeeds from "./view/pages/Newfeeds";
// watch
import Watch from "./view/pages/Watch";
import Watchs from "./view/components/WatchTab/Watchs";
import Musics from "./view/components/WatchTab/Musics";
import Videos from "./view/components/WatchTab/Videos";

import Login from "./view/pages/Login";
import Register from "./view/pages/Register";
import Profile from "./view/pages/Profile";

import FriendShip from "./view/pages/FriendsShip";
import FriendList from "./view/components/FriendTab/FriendList";
import NewFriend from "./view/components/FriendTab/NewFriend";

import Activity from "./view/components/Activity";
import Call from "./view/pages/Call";
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
            }
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
                component: Activity,
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
        ],
        meta: { AppProduct: true },
    },
];

export default routes;
