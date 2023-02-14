import layout from "./view/layout/layout";
import Newfeeds from "./view/pages/Newfeeds";
import Login from "./view/pages/Login";
import Register from "./view/pages/Register";
import Profile from "./view/pages/Profile";
import FriendShip from "./view/components/FriendsShip";
import FriendList from "./view/components/friends/FriendList";
import NewFriend from "./view/components/friends/NewFriend";

import Activity from "./view/components/Activity";

const routes = [
    {
        path: "/",
        component: layout,
        children: [
            {
                path: "/",
                component: Newfeeds,
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
        path: "/profile",
        component: Profile,
        // redirect: "/activity",
        children: [
            {
                path: "",
                component: Activity,
            },
            {
                path: "/friendship",
                component: FriendShip,
                redirect: "/friendship/friend_list",
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
