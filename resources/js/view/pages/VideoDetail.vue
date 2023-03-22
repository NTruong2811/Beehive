<template>
    <div class="container-fluid">
        <div class="video-detail row">
            <div class="video-container col-sm-12 col-md-8">
                <div class="support">
                    <div class="exit" @click="back">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <video controls autoplay loop :src="Video.src"></video>
            </div>
            <div class="video-info col-sm-12 col-md-4">
                <div class="post-info">
                    <div class="user-info">
                        <div class="user-details">
                            <div class="avt">
                                <img :src="User.avatar" alt="User Avatar" />
                            </div>
                            <h3>{{ User.name }}</h3>
                        </div>
                        <button
                            v-if="User.id != this.userInfor.id"
                            class="add-friend-btn"
                        >
                            Add Friend
                        </button>
                    </div>
                    <p class="post-description">{{ Detail.description }}</p>
                </div>
                <br />
                <hr />
                <div class="comments wrapper">
                    <div class="comment_list">
                        <div class="comment">
                            <div>
                                <div class="content">
                                    <div class="avatar">
                                        <img
                                            src="https://randomuser.me/api/portraits/men/32.jpg"
                                        />
                                    </div>
                                    <div class="content-comment">
                                        <div class="user">
                                            <h5>Cameron Williamson</h5>
                                            <span class="is-mute"
                                                >17 SEP 2020</span
                                            >
                                        </div>
                                        <p>
                                            Serious astronomy fanatic like a lot
                                            of us are, you can probably remember
                                            that one event in childhood that
                                            started you along this exciting
                                            hobby.
                                        </p>
                                        <div class="content-footer">
                                            <button class="btn btn-outline">
                                                <i
                                                    class="ri-share-forward-fill"
                                                ></i
                                                >Reply
                                            </button>
                                            <button class="btn">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subcomment">
                                <div class="icon">
                                    <svg
                                        width="20"
                                        height="20"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M20 21a1 1 0 0 1-.883.993L19 22h-6.5a3.5 3.5 0 0 1-3.495-3.308L9 18.5V5.415L5.707 8.707a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1-.083-1.32l.083-.094 5-5a1.01 1.01 0 0 1 .112-.097l.11-.071.114-.054.105-.035.118-.025.058-.007L10 2l.075.003.126.017.111.03.111.044.098.052.092.064.094.083 5 5a1 1 0 0 1-1.32 1.497l-.094-.083L11 5.415V18.5a1.5 1.5 0 0 0 1.355 1.493L12.5 20H19a1 1 0 0 1 1 1Z"
                                            fill="#969696"
                                        />
                                    </svg>
                                </div>
                                <div class="other_comments">
                                    <div class="com">
                                        <div class="content">
                                            <div class="avatar">
                                                <img
                                                    src="https://api.uifaces.co/our-content/donated/xZ4wg2Xj.jpg"
                                                />
                                            </div>
                                            <div class="content-comment">
                                                <div class="user">
                                                    <h5>Bessie Cooper</h5>
                                                    <span class="is-mute"
                                                        >17 SEP 2020</span
                                                    >
                                                </div>
                                                <p>
                                                    Serious astronomy fanatic
                                                    like.
                                                </p>
                                                <div class="content-footer">
                                                    <button
                                                        class="btn btn-outline"
                                                    >
                                                        <i
                                                            class="ri-share-forward-fill"
                                                        ></i
                                                        >Reply
                                                    </button>
                                                    <button class="btn">
                                                        <i
                                                            class="ri-more-fill"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div>
                                <div class="content">
                                    <div class="avatar">
                                        <img
                                            src="https://randomuser.me/api/portraits/men/32.jpg"
                                        />
                                    </div>
                                    <div class="content-comment">
                                        <div class="user">
                                            <h5>Cameron Williamson</h5>
                                            <span class="is-mute"
                                                >17 SEP 2020</span
                                            >
                                        </div>
                                        <p>
                                            Serious astronomy fanatic like a lot
                                            of us are, you can probably remember
                                            that one event in childhood that
                                            started you along this exciting
                                            hobby.
                                        </p>
                                        <div class="content-footer">
                                            <button class="btn btn-outline">
                                                <i
                                                    class="ri-share-forward-fill"
                                                ></i
                                                >Reply
                                            </button>
                                            <button class="btn">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subcomment">
                                <div class="icon">
                                    <svg
                                        width="20"
                                        height="20"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M20 21a1 1 0 0 1-.883.993L19 22h-6.5a3.5 3.5 0 0 1-3.495-3.308L9 18.5V5.415L5.707 8.707a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1-.083-1.32l.083-.094 5-5a1.01 1.01 0 0 1 .112-.097l.11-.071.114-.054.105-.035.118-.025.058-.007L10 2l.075.003.126.017.111.03.111.044.098.052.092.064.094.083 5 5a1 1 0 0 1-1.32 1.497l-.094-.083L11 5.415V18.5a1.5 1.5 0 0 0 1.355 1.493L12.5 20H19a1 1 0 0 1 1 1Z"
                                            fill="#969696"
                                        />
                                    </svg>
                                </div>
                                <div class="other_comments">
                                    <div class="com">
                                        <div class="content">
                                            <div class="avatar">
                                                <img
                                                    src="https://api.uifaces.co/our-content/donated/xZ4wg2Xj.jpg"
                                                />
                                            </div>
                                            <div class="content-comment">
                                                <div class="user">
                                                    <h5>Bessie Cooper</h5>
                                                    <span class="is-mute"
                                                        >17 SEP 2020</span
                                                    >
                                                </div>
                                                <p>
                                                    Serious astronomy fanatic
                                                    like.
                                                </p>
                                                <div class="content-footer">
                                                    <button
                                                        class="btn btn-outline"
                                                    >
                                                        <i
                                                            class="ri-share-forward-fill"
                                                        ></i
                                                        >Reply
                                                    </button>
                                                    <button class="btn">
                                                        <i
                                                            class="ri-more-fill"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div>
                                <div class="content">
                                    <div class="avatar">
                                        <img
                                            src="https://randomuser.me/api/portraits/men/32.jpg"
                                        />
                                    </div>
                                    <div class="content-comment">
                                        <div class="user">
                                            <h5>Cameron Williamson</h5>
                                            <span class="is-mute"
                                                >17 SEP 2020</span
                                            >
                                        </div>
                                        <p>
                                            Serious astronomy fanatic like a lot
                                            of us are, you can probably remember
                                            that one event in childhood that
                                            started you along this exciting
                                            hobby.
                                        </p>
                                        <div class="content-footer">
                                            <button class="btn btn-outline">
                                                <i
                                                    class="ri-share-forward-fill"
                                                ></i
                                                >Reply
                                            </button>
                                            <button class="btn">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subcomment">
                                <div class="icon">
                                    <svg
                                        width="20"
                                        height="20"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M20 21a1 1 0 0 1-.883.993L19 22h-6.5a3.5 3.5 0 0 1-3.495-3.308L9 18.5V5.415L5.707 8.707a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1-.083-1.32l.083-.094 5-5a1.01 1.01 0 0 1 .112-.097l.11-.071.114-.054.105-.035.118-.025.058-.007L10 2l.075.003.126.017.111.03.111.044.098.052.092.064.094.083 5 5a1 1 0 0 1-1.32 1.497l-.094-.083L11 5.415V18.5a1.5 1.5 0 0 0 1.355 1.493L12.5 20H19a1 1 0 0 1 1 1Z"
                                            fill="#969696"
                                        />
                                    </svg>
                                </div>
                                <div class="other_comments">
                                    <div class="com">
                                        <div class="content">
                                            <div class="avatar">
                                                <img
                                                    src="https://api.uifaces.co/our-content/donated/xZ4wg2Xj.jpg"
                                                />
                                            </div>
                                            <div class="content-comment">
                                                <div class="user">
                                                    <h5>Bessie Cooper</h5>
                                                    <span class="is-mute"
                                                        >17 SEP 2020</span
                                                    >
                                                </div>
                                                <p>
                                                    Serious astronomy fanatic
                                                    like.
                                                </p>
                                                <div class="content-footer">
                                                    <button
                                                        class="btn btn-outline"
                                                    >
                                                        <i
                                                            class="ri-share-forward-fill"
                                                        ></i
                                                        >Reply
                                                    </button>
                                                    <button class="btn">
                                                        <i
                                                            class="ri-more-fill"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div>
                                <div class="content">
                                    <div class="avatar">
                                        <img
                                            src="https://randomuser.me/api/portraits/men/32.jpg"
                                        />
                                    </div>
                                    <div class="content-comment">
                                        <div class="user">
                                            <h5>Cameron Williamson</h5>
                                            <span class="is-mute"
                                                >17 SEP 2020</span
                                            >
                                        </div>
                                        <p>
                                            Serious astronomy fanatic like a lot
                                            of us are, you can probably remember
                                            that one event in childhood that
                                            started you along this exciting
                                            hobby.
                                        </p>
                                        <div class="content-footer">
                                            <button class="btn btn-outline">
                                                <i
                                                    class="ri-share-forward-fill"
                                                ></i
                                                >Reply
                                            </button>
                                            <button class="btn">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subcomment">
                                <div class="icon">
                                    <svg
                                        width="20"
                                        height="20"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M20 21a1 1 0 0 1-.883.993L19 22h-6.5a3.5 3.5 0 0 1-3.495-3.308L9 18.5V5.415L5.707 8.707a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1-.083-1.32l.083-.094 5-5a1.01 1.01 0 0 1 .112-.097l.11-.071.114-.054.105-.035.118-.025.058-.007L10 2l.075.003.126.017.111.03.111.044.098.052.092.064.094.083 5 5a1 1 0 0 1-1.32 1.497l-.094-.083L11 5.415V18.5a1.5 1.5 0 0 0 1.355 1.493L12.5 20H19a1 1 0 0 1 1 1Z"
                                            fill="#969696"
                                        />
                                    </svg>
                                </div>
                                <div class="other_comments">
                                    <div class="com">
                                        <div class="content">
                                            <div class="avatar">
                                                <img
                                                    src="https://api.uifaces.co/our-content/donated/xZ4wg2Xj.jpg"
                                                />
                                            </div>
                                            <div class="content-comment">
                                                <div class="user">
                                                    <h5>Bessie Cooper</h5>
                                                    <span class="is-mute"
                                                        >17 SEP 2020</span
                                                    >
                                                </div>
                                                <p>
                                                    Serious astronomy fanatic
                                                    like.
                                                </p>
                                                <div class="content-footer">
                                                    <button
                                                        class="btn btn-outline"
                                                    >
                                                        <i
                                                            class="ri-share-forward-fill"
                                                        ></i
                                                        >Reply
                                                    </button>
                                                    <button class="btn">
                                                        <i
                                                            class="ri-more-fill"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div>
                                <div class="content">
                                    <div class="avatar">
                                        <img
                                            src="https://randomuser.me/api/portraits/men/32.jpg"
                                        />
                                    </div>
                                    <div class="content-comment">
                                        <div class="user">
                                            <h5>Cameron Williamson</h5>
                                            <span class="is-mute"
                                                >17 SEP 2020</span
                                            >
                                        </div>
                                        <p>
                                            Serious astronomy fanatic like a lot
                                            of us are, you can probably remember
                                            that one event in childhood that
                                            started you along this exciting
                                            hobby.
                                        </p>
                                        <div class="content-footer">
                                            <button class="btn btn-outline">
                                                <i
                                                    class="ri-share-forward-fill"
                                                ></i
                                                >Reply
                                            </button>
                                            <button class="btn">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subcomment">
                                <div class="icon">
                                    <svg
                                        width="20"
                                        height="20"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M20 21a1 1 0 0 1-.883.993L19 22h-6.5a3.5 3.5 0 0 1-3.495-3.308L9 18.5V5.415L5.707 8.707a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1-.083-1.32l.083-.094 5-5a1.01 1.01 0 0 1 .112-.097l.11-.071.114-.054.105-.035.118-.025.058-.007L10 2l.075.003.126.017.111.03.111.044.098.052.092.064.094.083 5 5a1 1 0 0 1-1.32 1.497l-.094-.083L11 5.415V18.5a1.5 1.5 0 0 0 1.355 1.493L12.5 20H19a1 1 0 0 1 1 1Z"
                                            fill="#969696"
                                        />
                                    </svg>
                                </div>
                                <div class="other_comments">
                                    <div class="com">
                                        <div class="content">
                                            <div class="avatar">
                                                <img
                                                    src="https://api.uifaces.co/our-content/donated/xZ4wg2Xj.jpg"
                                                />
                                            </div>
                                            <div class="content-comment">
                                                <div class="user">
                                                    <h5>Bessie Cooper</h5>
                                                    <span class="is-mute"
                                                        >17 SEP 2020</span
                                                    >
                                                </div>
                                                <p>
                                                    Serious astronomy fanatic
                                                    like.
                                                </p>
                                                <div class="content-footer">
                                                    <button
                                                        class="btn btn-outline"
                                                    >
                                                        <i
                                                            class="ri-share-forward-fill"
                                                        ></i
                                                        >Reply
                                                    </button>
                                                    <button class="btn">
                                                        <i
                                                            class="ri-more-fill"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-comment">
                    <div class="post-comment">
                        <input type="text" placeholder="Write some thing..." />
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.video-detail {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100vw;
    height: 100vh;
}
hr {
    margin: 0px !important;
    position: relative;
    width: 120%;
    left: -10%;
}
.support {
    position: fixed;
    top: 0px;
    left: 0px;
    width: inherit;
    padding: 20px;
    z-index: 100;
}
.support .exit {
    width: 40px;
    height: 40px;
    background-color: rgba(84, 84, 84, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 100%;
}
.support .exit i {
    color: white;
    font-size: 22px;
}
.video-container {
    background-color: black;
    height: 100vh;
}
.video-container video {
    width: 100%;
    height: 100vh;
    background-color: #000;
    margin: 0 auto;
    display: block;
    outline: none;
}

.post-info {
    display: flex;
    flex-direction: column;
    width: 100%;
    border-radius: 5px;
}
.video-info {
    padding: 20px !important;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    /* width: 100%; */
    position: relative;
    overflow: hidden;
}
.user-info {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}
.user-details {
    display: flex;
    align-items: center;
    gap: 10px;
}
.user-details .avt {
    width: 50px;
    height: 50px;
    overflow: hidden;
    border: 1px solid #4f5261;
    border-radius: 100%;
    padding: 2%;
}
.user-details img {
    border-radius: 100%;
    width: 100%;
}
.user-details h3 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

.add-friend-btn {
    margin-left: auto;
    background-image: linear-gradient(
        90deg,
        #8224e3 0,
        #a968ec 50%,
        #8224e3 100%
    );
    border: 0px;
    box-shadow: 0 1px 2px 0 rgb(130 36 227 / 50%);
    color: white;
    font-size: 12px;
    outline: none;
    padding: 8px 40px;
    /* border-radius: 20px; */
}

.post-description {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}

.video-description p {
    font-size: 16px;
    margin-bottom: 10px;
}

.comments h3 {
    font-size: 16px;
    margin-bottom: 10px;
}

.wrapper {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    position: relative;
}
.wrapper .comment {
    display: grid;
    gap: 20px;
    user-select: none;
}
.wrapper .comment .content {
    display: grid;
    grid-template-columns: auto 1fr 110px;
    align-items: flex-start;
    gap: 16px;
    flex: 1;
}
.wrapper .comment .content .avatar {
    height: 48px;
    width: 48px;
}
.wrapper .comment .content .avatar img {
    max-width: 100%;
    border-radius: 999px;
    object-fit: cover;
}
.wrapper .comment .content .rate {
    gap: 8px;
    display: flex;
    align-items: center;
}
.wrapper .comment .content .rate .value {
    font-weight: 500;
    font-size: 13px;
    line-height: 20px;
    text-align: center;
}
.wrapper .comment .content .rate .value.green {
    color: #00ba34;
}
.wrapper .comment .content .rate .value.red {
    color: #e92c2c;
}
.wrapper .comment .content .rate .btn {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e8e8e8;
    border-radius: 999px;
    width: 32px;
    height: 32px;
}
.wrapper .comment .content .rate .btn:hover {
    border-color: #969696;
}
.wrapper .comment .content-comment {
    flex: 1;
    display: block;
}
.wrapper .comment .content-comment .user {
    gap: 12px;
    margin-bottom: 6px;
    align-items: center;
    display: flex;
}
.wrapper .comment .content-footer {
    margin-top: 12px;
    gap: 12px;
    display: flex;
    align-items: center;
}
.wrapper .subcomment {
    display: flex;
    align-items: flex-start;
}
.wrapper .subcomment .icon {
    width: 48px;
    height: 48px;
    color: #969696;
    display: flex;
    margin-right: 16px;
    align-items: center;
    justify-content: center;
}
.wrapper .subcomment .other_comments {
    flex: 1;
    display: grid;
    gap: 20px;
}
h5 {
    color: #1c1c1c;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
}
.is-mute {
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: #969696;
}
button {
    appearance: none;
    background: transparent;
    outline: 0;
    border: 0;
    margin: 0;
    padding: 0;
    font: inherit;
    cursor: pointer;
    user-select: none;
    transition: 0.2s ease;
}
.btn {
    display: flex;
    flex-direction: row;
    align-items: center;
    color: #1c1c1c;
    padding: 4px 8px;
    font-size: 16px;
    background: transparent;
    gap: 6px;
    border-radius: 8px;
}
.btn i {
    font-size: 16px;
    color: #969696;
}
.btn-outline {
    background: transparent;
    border: 1px solid #e8e8e8;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.06);
}
.btn:hover {
    border-color: #969696;
}
.comment_list {
    overflow-y: auto;
    max-height: 100%;
}
.form-comment {
    background-color: #969696;
}
.post-comment {
    display: flex;
    position: absolute;
    width: 100%;
    bottom: 0px;
    left: 0px;
    padding-left: 15px;
}

.post-comment input {
    width: 100%;
    border: 0px;
    outline: none;
    border: 1px solid;
    border-color: #e7edf277;
    padding: 0px 45px 0px 2%;
    font-size: 13px;
    height: 50px;
}
.post-comment .avt {
    border-radius: 100%;
    width: 45px;
    height: 45px;
}
.post-comment i {
    position: absolute;
    right: 20px;
    top: 20%;
    transform: translate(-50%, 50%);
}
</style>

<script>
import $ from "jquery";
import { VideoDetail } from "../../services/Watch";
export default {
    setup() {},
    data() {
        return {
            Detail: {},
            Video: {},
            User: {},
            VideoId: this.$route.query.id,
            // NextVideo: null,
            // PrevVideo: null,
            // CountVideo: 1,
        };
    },
    created() {
        this.GetVideoDetail(this.VideoId);
    },
    methods: {
        async GetVideoDetail(id) {
            this.Detail = await VideoDetail(id).then((res) => {
                return res.data;
            });
            this.Video = this.Detail.video;
            this.User = this.Detail.user;
        },
        back() {
            window.history.back();
        },
    },
    mounted() {
        // $(document).keydown((e) => {
        //     if (this.VideosDetail[0].id != this.VideoId) {
        //         if (e.keyCode == 38) {
        //             // truoc khi prev video thi gan id tren url hien tai vao NextVideo
        //             this.NextVideo = this.VideoId;
        //             // thay doi url
        //             this.$router.push("video-detail?id=" + this.PrevVideo);
        //             this.VideoId = this.PrevVideo;
        //         }
        //     }
        //     if (this.CountVideo <= this.VideosDetail.length) {
        //         if (e.keyCode == 40) {
        //             // truoc khi next video thi gan  id tren url hien tai vao PrevVideo
        //             this.PrevVideo = this.VideoId;
        //             // thay doi url
        //             this.$router.push("video-detail?id=" + this.NextVideo);
        //             // gan cho videoid id cua video moi next
        //             this.VideoId = this.NextVideo;
        //             this.CountVideo += 1;
        //             this.NextVideo = this.VideosDetail[this.CountVideo].id;
        //         }
        //     }
        // });
        // $(document).ready(() => {
        //     console.log($(".container-fluid").find(".row"));
        // });
        // var VueThis = this;
        // var observer = new IntersectionObserver(
        //     function (entries, observer) {
        //         entries.forEach(function (entry) {
        //             if (entry.isIntersecting) {
        //             } else {
        //             }
        //         });
        //     },
        //     { threshold: 0, rootMargin: "-350px 0px" }
        // );
    },
};
</script>
