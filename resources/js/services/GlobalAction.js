import instance from "./config";

export function search(keyword) {
    return instance.get("search?keyword=" + keyword);
}
