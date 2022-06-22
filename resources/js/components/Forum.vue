<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <h1 class="mt-4">MAQE Forum</h1>

        <div class="mb-4">Your current timezone is: {{ timezone }}</div>

        <div
          v-for="(post, key) in posts"
          :key="`post_${post.id}`"
          class="card mb-3 shadow"
          :class="{
            'odd': key % 2
          }"
        >
          <div class="card-header p-2">
            <img :src="post.author.avatar_url" alt="avatar" class="avatar-thumb me-2">
            {{ post.author.name }}
            <span class="text-secondary small">
              Posted on {{ post.created_at | format_date }}
            </span>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-4 mb-3 mb-md-0">
                <img :src="post.image_url" :alt="post.title" class="post-image">
              </div>

              <div class="col-md-8">
                <h4>{{ post.title }}</h4>
                {{ post.body }}
              </div>
            </div>
          </div>
        </div>

        <scroll-loader :loader-method="getPosts" :loader-disable="meta.current_page === meta.last_page"></scroll-loader>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      timezone: moment.tz.guess(),
      posts: [],
      disable_load: false,
      meta: {
        current_page: 0,
        last_page: null,
      },
    }
  },

  methods: {
    getPosts () {
      return axios.get('posts', {
        params: {
          page: this.meta.current_page + 1,
        },
      })
        .then(({ data }) => {
          this.posts.push(...data.data)
          this.meta = data.meta
        })
    },
  },

  filters: {
    format_date (val) {
      return moment(val).format('dddd, MMM D, Y HH:mm')
    },
  },
}
</script>

<style lang="scss">
.avatar-thumb {
  vertical-align: middle;
  border-radius: 50%;
  overflow: hidden;
  height: 25px;
  width: 25px;
}

.post-image {
  width: 100%;
  max-height: 200px;
  object-fit: cover;
}

.card {
  & .card-header {
    background-color: white;
  }

  &.odd {
    & .card-header,
    & .card-body {
      background-color: rgba(var(--bs-primary-rgb), 0.4);
    }
  }
}
</style>
