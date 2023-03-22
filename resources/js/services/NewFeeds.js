import instance from "./config";

export function newfeeds() {
    return instance.get('/newfeeds');
}
