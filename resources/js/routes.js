import layout from "./view/layout/layout";
import Newfeeds from "./view/pages/Newfeeds";
import Login from "./view/pages/Login";
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
    },
    {
        path: "/login",
        component: Login,
    },
];

export default routes;
